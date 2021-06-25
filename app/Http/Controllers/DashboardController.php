<?php

namespace App\Http\Controllers;

use App\Model\Transaction;
use App\Model\User;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller {

    public function __construct() {
//        $this->middleware('auth');
    }

    public function index(Request $request) {
        $totalUsers = User::where('type', 'user')->count();

        $totalTodayTransaction        = Transaction::whereDate('created_at', Carbon::today())->count();
        $totalTodayPandingTransaction = Transaction::whereDate('created_at', Carbon::today())->where('status', 'pending')->count();
        $totalTodayRefundTransaction  = Transaction::whereDate('created_at', Carbon::today())->where('status', 'refund')->count();

        $topCountries = Transaction::select('user_id', DB::raw('count(*) as totalTransaction'))
            ->with([
                'user' => function ($qry) {
                    $qry->with('countryData');
                },
            ])
            ->groupBy('user_id')
            ->get();

        $arrTopCountries = [];
        foreach ($topCountries as $tc) {
            $varTopCountries = [
                'countryId'        => $tc->user->countryData->id,
                'countryName'      => $tc->user->countryData->name,
                'totalTransaction' => $tc->totalTransaction,
            ];

            array_push($arrTopCountries, $varTopCountries);
        }

        // Make arrTransactions as TransactionDate's Groupwise
        $newArray = [];
        foreach ($arrTopCountries as $key => $value) {
            $exists = 0;
            $i      = 0;

            $countryId   = $value['countryId'];
            $countryName = $value['countryName'];
            $data        = $value;

            foreach ($newArray as $key2 => $value2) {
                if ($countryId == $value2['countryId']) {
                    $newArray[$key2]['transaction'][] = $data;
                    $exists                           = 1;
                }
                $i++;
            }

            if ($exists == 0) {
                $newArray[$i]['countryId']     = $countryId;
                $newArray[$i]['countryName']   = $countryName;
                $newArray[$i]['transaction'][] = $data;
            }
        }

        $loopCount = 0;

        $arrFinalTransaction = [];
        foreach ($newArray as $na) {
            if ($loopCount == 10) {
                break;
            }

            $totalFinalTransaction = 0;

            foreach ($na['transaction'] as $trns) {
                $totalFinalTransaction += $trns['totalTransaction'];
            }

            $varFinalTransaction = [
                'countryId'             => $na['countryId'],
                'countryName'           => $na['countryName'],
                'totalFinalTransaction' => $totalFinalTransaction,
            ];

            array_push($arrFinalTransaction, $varFinalTransaction);

            $loopCount++;
        }

        usort($arrFinalTransaction, function ($a, $b) {
            return $b['totalFinalTransaction'] > $a['totalFinalTransaction'];
        });

        $transactionDate = $request->transaction_date;
        $from            = '';
        $to              = '';

        if ($transactionDate) {
            $daterange = explode('-', $request->transaction_date);

            $from = Carbon::parse($daterange[0])->startOfDay()->toDateTimeString();
            $to   = Carbon::parse($daterange[1])->endOfDay()->toDateTimeString();
        }

        $dateS = Carbon::now()->startOfMonth()->subMonth(11);
        $dateE = Carbon::now()->endOfMonth();

        $transactionChart = Transaction::selectRaw('year(created_at) year, month(created_at) month, monthname(created_at) monthname, sum(fee_rate_usd) total_amount')
            ->where(function ($query) use ($dateS, $dateE, $from, $to) {
                if ($from != '' && $to != '') {
                    $query->whereBetween('created_at', [$from, $to]);
                } else {
                    $query->whereBetween('created_at', [$dateS, $dateE]);
                }
            })
            ->groupBy('year', 'month', 'monthname')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $transactionChartMonth        = json_encode($transactionChart->pluck('monthname')->toArray());
        $transactionChartTotalRevenue = json_encode($transactionChart->pluck('total_amount')->toArray());

        $totalProfit = array_sum($transactionChart->pluck('total_amount')->toArray());

        $dateRange = '';
        if ($from != '' && $to != '') {
            $dateRange = Carbon::parse($from)->format('m/d/Y') . ' - ' . Carbon::parse($to)->format('m/d/Y');
        }

        return view('admin.dashboard')->with([
            'totalUsers'                   => $totalUsers,
            'totalTodayTransaction'        => $totalTodayTransaction,
            'totalTodayPandingTransaction' => $totalTodayPandingTransaction,
            'totalTodayRefundTransaction'  => $totalTodayRefundTransaction,
            'arrFinalTransaction'          => $arrFinalTransaction,
            'transactionChart'             => $transactionChart,
            'transactionChartMonth'        => $transactionChartMonth,
            'transactionChartTotalRevenue' => $transactionChartTotalRevenue,
            'totalProfit'                  => $totalProfit,
            'dateRange'                    => $dateRange,
        ]);
    }

    public function profile(Request $request) {
        $user = Auth::user();
        return view('admin.account.profile', compact('user'));
    }

    public function profileEdit(Request $request) {
        $user = Auth::user();
        return view('admin.account.profile_edit', compact('user'));
    }

    public function profileUpdate(Request $request) {
        $user = Auth::user();

        $request->validate([
            'first_name'    => 'required',
            'last_name'     => 'required',
            'email'         => 'required|email|unique:users,email,' . $user->id,
            'phone'         => 'required|unique:users,phone,' . $user->id,
            'date_of_birth' => 'required',
            'gender'        => 'required',
            'address1'      => 'required',
            'address2'      => 'nullable',
            'city'          => 'required',
            'image'         => 'nullable|image:jpeg,jpg,png',
        ]);

        $user->first_name    = $request->first_name;
        $user->last_name     = $request->last_name;
        $user->email         = $request->email;
        $user->phone         = $request->phone;
        $user->date_of_birth = date("Y-m-d", strtotime($request->date_of_birth));
        $user->address1      = $request->address1;
        $user->address2      = $request->address2;
        $user->city          = $request->city;
        $user->state         = $request->state;
        $user->country       = $request->country;

        if ($request->hasFile('image')) {
            $image       = $request->file('image');
            $imageName   = 'user' . time() . "." . $image->getClientOriginalExtension();
            $imagePath   = $image->storeAs('images/user', $imageName);
            $user->image = $imagePath;
        }

        $user->save();
        return redirect()->route('account.profile.edit')->withSuccess('Profile update successfully.');
    }

    public function changePassword() {
        return view('admin.account.change_password');
    }

    public function updatePassword(Request $request) {

        $request->validate([
            'current_password' => 'required',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        try {
            $user = Auth::user();
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json(['Success' => false, 'message' => 'Validation failed.', 'errors' =>
                    ['current_password' => ['The current password does not match.']]], 422);
            }

            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('account.change-password')->withSuccess("Password updated successfully.!");
        } catch (\Exception $e) {
            return redirect()->route('account.change-password')->withError($e->getMessage());
        }
    }
}
