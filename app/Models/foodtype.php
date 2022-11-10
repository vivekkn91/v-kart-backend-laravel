<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foodtype extends Model
{
    protected $table='foodtype';
     protected $fillable = ['typeoffood'];
    use HasFactory;
}
