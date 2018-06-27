<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Services;
class Products extends Model{
    protected $table = 'products';
    protected $fillable = [
        'id_user',
        'id_product_user',
        'provider_id',
        'name',
        'price',
        'description',
        'active'
        
    ];

    //-------------------------------------------------------
    // Relationships
    //-------------------------------------------------------


    public function providers(){
        return $this->hasOne('App\Models\Providers', 'provider_id');
    }
    public function services(){
        return $this->belongsToMany(Services::class,'products_services','product_id','service_id')
                    ->withPivot('id_product_service_user','amount','id_user')
                    ->withTimestamps();
    }
    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }
    //-------------------------------------------------------
    // Accessors
    //-------------------------------------------------------
    public function getPriceAttribute()
    {
        return $this->attributes['price']/1000;
    }

    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price*1000;
    }
    public function setNameAttribute($name){
        $this->attributes['name'] = ucfirst($name);
    }

    
    //-------------------------------------------------------
    // Scopes
    //-------------------------------------------------------

}
