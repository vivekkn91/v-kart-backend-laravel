<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

       protected $fillable = ['item','price','sale_price','total_price','tax','selling_price','status',];
  
    use HasFactory;
}
