<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id', 'name', 'deleted_at'];

    public function tshirt_images()
    {
        return $this->hasMany(Tshirt_images::class,'id','category_id');
    }
}
