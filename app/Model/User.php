<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_id', 'first_name', 'middle_name', 'last_name', 'email', 'password', 'google_id', 'type', 'date_of_birth', 'phone', 'image', 'front_proof', 'back_proof', 'is_proof_verified', 'address', 'address2', 'city', 'state', 'country', 'otp', 'otp_time', 'zipcode', 'reference', 'occupation', 'user_uniqu_id', 'is_verified',
    ];

    protected $hidden = [
        'password', 'remember_token', 'deleted_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function isAuthorized($object, $operation) {
        return DB::table('role_permissions')
            ->where('object', $object)
            ->where('operation', $operation)
            ->join('user_roles', 'user_roles.role_id', '=', 'role_permissions.role_id')
            ->where('user_roles.user_id', $this->id)
            ->exists();
    }

    public function defaultAddress() {
        return $this->hasOne(Address::class, 'user_id');
    }
    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public static function generateOTP() {
        return $otp = mt_rand(100000, 999999);
    }

    public function countryData() {
        return $this->hasOne(Country::class, 'id', 'country');
    }

    public function bankField() {
        return $this->hasOne(BankFields::class, 'country_id', 'country');
    }

    public function userBankDetail() {
        return $this->hasMany(UserBankDetail::class, 'user_id', 'id');
    }

    public function transaction() {
        return $this->hasMany(Transaction::class, 'user_id', 'id');
    }
}
