<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_items extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id', 'order_id', 'tshirt_image_id', 'color_code', 'size', 'qty', 'unit_price', 'sub_total'];

    public function orders()
    {
        return $this->hasOne(orders::class, 'id', 'order_id');
    }

    public function colors()
    {
        return $this->hasOne(colors::class, 'code', 'color_code');
    }

    public function tshirtImage()
    {
        return $this->hasOne(tshirt_images::class,'id','tshirt_image_id');
    }
}
