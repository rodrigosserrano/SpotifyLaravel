<?php

namespace App\Entities;

use App\Illuminate\Custom\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    use HasFactory;

    protected $table = 'user_status';
    protected $guarded = [];
    public $timestamps = true;
}
