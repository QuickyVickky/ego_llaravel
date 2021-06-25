<?php

namespace App\Http\Middleware;

use App\Model\AccessToken;
use Closure;

class ApiAuthToken {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $data = AccessToken::where('accesstoken', $request->header('accesstoken'))->first();

        if (!$data) {
            return response()->json([
                'success' => Config('constants.invalidToken.success'),
                'message' => Config('constants.invalidToken.message'),
                'data'    => Config('constants.emptyData'),
            ], Config('constants.invalidToken.statusCode'));
        }

        $request->attributes->add([
            'auth_user_id' => $data->user_id,
        ]);

        return $next($request);
    }
}
