<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','status','customer_id','date','total_price','notes','nif','address','payment_type','payment_ref','receipt_url','created_at','updated_at'];

    public function customers()
    {
        return $this->belongsToOne(Customers::class,'customer_id','id');
    }

    public function colors()
    {
        return $this->HasOne(Colors::class,'color_code','code');
    }

    public function tshirt_images()
    {
        return $this->HasOne(Tshirt_images::class,'tshirt_image_id','id');
    }
}
