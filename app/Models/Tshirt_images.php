<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tshirt_images extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id','customer_id','category_id','name','description','image_url','extra_info','created_at','updated_at','deleted_at'];

    public function order_items()
    {
        return $this->belongsToMany(Order_items::class,'id','tshirt_image_id');
    }

    public function customers()
    {
        return $this->belongsToOne(Customers::class,'customer_id','id');
    }

    public function categories()
    {
        return $this->belongsToOne(Categories::class,'category_id','id');
    }
}
