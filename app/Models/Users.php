<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['id', 'name', 'email', 'email_verified_at', 'password', 'remember_token', 'created_at', 'updated_at', 'user_type', 'blocked', 'photo_url', 'deleted_at'];

    public function customers()
    {
        return $this->hasOne(Customers::class, 'id', 'id');
    }
}
