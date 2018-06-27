<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Customers;
use App\Models\Products;

class Services extends Model{
    protected $table = 'services';
    protected $fillable = [
        'name',
        'id_user',
        'id_service_user',
        'price',
        'description',
        'active'
        
    ];

    //-------------------------------------------------------
    // Relationships
    //-------------------------------------------------------

    public function users(){
        return $this->hasOne(User::class,'id_user');
    }
    public function customers(){
        return $this->belongsToMany(Customers::class,'customers_services','service_id','customer_id')
                    ->withPivot('id_customer_service_user','amount','date','id_user')
                    ->withTimestamps();
    }
    public function products(){
        return $this->belongsToMany(Products::class,'products_services','service_id','product_id')
                ->withPivot('id_product_service_user','amount','id_user')
                ->withTimestamps();
    }
    //-------------------------------------------------------
    // Accessors
    //-------------------------------------------------------
    
    public function getPriceAttribute(){
        return $this->attributes['price']/1000;
    }
    public function setPriceAttribute($price){
        $this->attributes['price'] = $price*1000;
    }
    public function setNameAttribute($name){
        $this->attributes['name'] = ucfirst($name);
    }

    //-------------------------------------------------------
    // Scopes
    //-------------------------------------------------------

}
