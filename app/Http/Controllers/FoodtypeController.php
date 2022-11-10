<?php

namespace App\Http\Controllers;
use App\Models\Foodtype;
use Illuminate\Http\Request;
use DB;

class FoodtypeController extends Controller
{
  public function createtype(Request $REQUEST){
    //  dd($REQUEST->all());
    //   if (is_array($REQUEST) || is_object($REQUEST)) {
    // foreach ($REQUEST as $value) {
    Foodtype::create($REQUEST->all());
    // ;
    // }
  $products = DB::table('foodtype')->get();
       return view('invetory.addtype', compact('products'));
}
}
