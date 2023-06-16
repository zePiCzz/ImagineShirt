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
        return $this->hasOne(orders::class, 'order_id', 'id');
    }

    public function colors()
    {
        return $this->hasOne(colors::class,'color_code','code');
    }

    public function tshirt_images()
    {
        return $this->hasOne(tshirt_images::class,'tshirt_image','id');
    }
}
