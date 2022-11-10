<?php

namespace App\Http\Controllers;
use App\Models\Inventory;
use App\Models\foodtype;
use Illuminate\Http\Request;
use DB;


class InventoryController extends Controller
{
  public function index(){
    $products = DB::table('foodtype')->get();
    return view('invetory.index', compact('products'));
}
  public function sales(){
    return view('invetory.sale');
}


public function gettypes()

{
  // $posts = \App\Post::all();
  $products = DB::table('foodtype')->get();
   $count = DB::table('foodtype')->count();
//  dd($products);

  return view('invetory.addtype', compact('products'));
}

  public function getajax(){
  $products = DB::table('foodtype')->get();
    return Json($products, JsonRequestBehavior.AllowGet);
}
// 

  public function types(){
    return view('invetory.addtype');
}
//   public function create(Request $REQUEST){
    
// // dd($REQUEST->all());
// Inventory::Create($REQUEST->all());
// return redirect()->action([InventoryController::class, 'index']);
    
// }

public function getinventoty()

{
  // $posts = \App\Post::all();
  $products = DB::table('inventories')->get();
   $count = DB::table('inventories')->count();
//  dd($products);

  return view('invetory.allitems', compact('products'));
}


// public function create(Request $REQUEST){
// Inventory::Create($REQUEST->all());
// return redirect()->action([InventoryController::class, 'index']);

// }


public function create(Request $REQUEST){
//  dd($REQUEST->all());
    foreach ($REQUEST->invetory as $key => $value) {
        Inventory::create($value);
    }
    return redirect()->action([InventoryController::class, 'index']);
}




    // foreach ($REQUEST->typeoffood as $key => $value) {
//         foodtype::create($value);;
    //   }
//
    // }
    // createtype
// }

public function update(Request $REQUEST){
Inventory::where('user_id', $REQUEST->id)->update(['status' => $REQUEST->status]);

  
        // Inventory::update( $REQUEST->invetory as $key => $value);
 return view('invetory.inventory', compact('products'));

}


public function edit(Request $REQUEST){
  Inventory::where('user_id', $REQUEST->id)->update(['item' => $REQUEST->item,'price'=> $REQUEST->price,'total_price'=> $REQUEST->total_price,'tax'=> $REQUEST->tax,'selling_price'=> $REQUEST->selling_price,]);

  //  dd($REQUEST->id,$REQUEST->item);
  //  DB::table('Inventory')->where('_token', $REQUEST->_token)->update('item','price','sale_price','total_price','tax','selling_price','status',);
return back();
//  return view('invetory.inventory');

  // dd("success");
        // Inventory::update( $REQUEST->invetory as $key => $value);
//  return view('invetory.inventory', compact('products'));

}
  public function lost(){
    return Inventory::all();

}
}