<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','nif','address','default_payment_type','default_payment_ref','created_at','updated_at','deleted_at'];

    public function orders()
    {
        return $this->hasMany(Orders::class,'id','customer_id');
    }

    public function tshirt_images()
    {
        return $this->hasMany(Tshirt_images::class,'id','customer_id');
    }

    public function users()
    {
        return $this->belongsToOne(Users::class,'id','id');
    }
}
