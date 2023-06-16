<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['code','name','deleted_at'];

    public function order_items()
    {
        return $this->belongsToMany(Order_items::class,'code','color_code');
    }
}
