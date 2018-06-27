<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Customers;
use App\Models\Providers;
use App\Models\Services;
use App\Models\Products;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','surname','dni','address','cc'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //-------------------------------------------------------
    // Relationships
    //-------------------------------------------------------

    public function services(){
        return $this->hasMany(Services::class,'id_user');
    }
    public function providers(){
        return $this->hasMany(Providers::class,'id_user');
    }
    public function customers(){
        return $this->hasMany(Customers::class,'id_user');
    }
    public function products(){
        return $this->hasMany(Products::class,'id_user');
    }
}
