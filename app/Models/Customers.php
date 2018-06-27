<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Services;

class Customers extends Model{

    protected $table = 'customers';
    protected $fillable = [
        'id_customer_user',
        'id_user',
        'name',
        'surname',
        'address',
        'CIF',
        'phone',
        'cc',
        'active'
    ];

    //-------------------------------------------------------
    // Relationships
    //-------------------------------------------------------
    public function services(){
        return $this->belongsToMany(Services::class,'customers_services','customer_id','service_id')
                    ->withPivot('id_customer_service_user','amount','date','id_user')
                    ->withTimestamps();
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
    public function setSurnameAttribute($surname){
        $this->attributes['surname'] = ucfirst($surname);
    }
}
