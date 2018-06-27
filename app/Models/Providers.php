<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Products;

class Providers extends Model{
    protected $table = 'providers';
    protected $fillable = [
        'id_user',
        'id_provider_user',
        'name',
        'address',
        'CIF',
        'phone',
        'cc',
        'active'
    ];

    //-------------------------------------------------------
    // Relationships
    //-------------------------------------------------------

    public function products(){
        return $this->belongsTo(Products::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
   

    //-------------------------------------------------------
    // Accessors
    //-------------------------------------------------------
   
    public function setNameAttribute($name){
        $this->attributes['name'] = ucfirst($name);
    }
    //-------------------------------------------------------
    // Scopes
    //-------------------------------------------------------

   
    //-------------------------------------------------------
}
