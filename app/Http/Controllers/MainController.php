<?php

namespace App\Http\Controllers;
// use DB;

use App\Models\Products;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StorageProduct;
use StorageProduct as GlobalStorageProduct;

class MainController extends Controller
{
 
public function index(){

    $storagesList = Storage::get();

  

    $products = Products::orderBy('name', 'desc')->paginate(10);
    // dd($users);
    // dump($storagesList);
    return view('home', compact( 'products', 'storagesList'));

}


public function storage($storage = NULL){
    $storagesList = Storage::get();

    $storageObject = Storage::where('code', $storage)->first();


    $quantyty = StorageProduct::where('storage_id', $storageObject->id)->orderBy('product_id', 'desc')->get();
    $products = Products::orderBy('name', 'desc')->get();
    $minquantity= $quantyty->min('quanity');
    $maxquantity= $quantyty->max('quanity');
   
    return view('storage', compact('storage', 'storageObject', 'storagesList', 'products', 'quantyty', 'minquantity', 'maxquantity'));

}



// public function product($product = NULL){
//     $storagesList = Storage::get();

   
//     return view('product', ['product' => $product], compact('storagesList'));

// }



public function search(Request $request){
    $storagesList = Storage::get();
    $n = $request->n;
  
    $products = Products::where('name', 'LIKE', "%{$n}%")->orderBy('name', 'desc')->paginate(15);
  
    return view('home', compact('products', 'storagesList'));

}
 
public function add(Request $request){
    $storagesList = Storage::get();
   
    $product_name = $request->name;


    $validation = $request->validate([

        'code' => 'required|min:2|max:50',
        'description' => 'required|min:1'
    ]);

    DB::table('products')->insert([


 
        // 'storage_id'=> $request->storage_id,
        'code'=> $request->code,
        'name' => $request->name,
        'description' => $request->description,
   
        'image'=> Null,
        'price'=> $request->price,
        'created_at'=> $request->created_at,
        'updated_at'=> $request->updated_at
       

    ]);
    

    
   
    return view('add', compact( 'storagesList', 'product_name'));

}


public function addtostorage(Request $request){
    $storagesList = Storage::get();
   
    $product_name = $request->name;



    $validation = $request->validate([

        'product_id' => 'required',
        'quantity' => 'required'
    ]);
    $searchproductinstore = StorageProduct::where('storage_id', '=', $request->storage_id)->where('product_id', '=', $request->product_id)->first();

     if( $searchproductinstore == null){

        DB::table('storage_products')->insert([

            'storage_id'=>$request->storage_id,
            
            'product_id'=> $request->product_id,
            'quanity'=> $request->quantity,
            'created_at'=> $request->created_at,
            'updated_at'=> $request->updated_at
       
        ]);



     } else {
        // dd($request->quantity);
       
        DB::table('storage_products')->where('storage_id', '=', $request->storage_id)->where('product_id', '=', $request->product_id)->update([
            'quanity'=> $request->quantity,
            // 'updated_at'=> $request->updated_at       
        ]);
        dump($request->quantity);
        
      
     }
    

    
   
    return view('addtostorage', compact( 'storagesList', 'product_name'));

}




    public function del(Request $request){
        $deleted_id = $request->id;

      
        DB::table('products')->where('id', '=',  $deleted_id)->delete();
       
        $storagesList = Storage::get();
        $products = Products::orderBy('name', 'desc')->paginate(10);

        return view('home', compact( 'storagesList', 'deleted_id', 'products'));  ;
    }


    public function delfromstorage(Request $request){

        $deleted_id = $request->product_id;
      

        DB::table('storage_products')->where('storage_id', '=', $request->storage_id)->where('product_id', '=', $request->product_id)->delete();

        $storage =  $request->storage_id;


     
        $storagesList = Storage::get();
        $storageObject = Storage::where('id', $storage)->first();
        $quantyty = StorageProduct::where('storage_id', $storageObject->id)->orderBy('product_id', 'desc')->get();
        $products = Products::orderBy('name', 'desc')->get();
    
      











        return view('storage', compact('storage', 'storagesList', 'storageObject', 'deleted_id', 'products', 'quantyty')); 
    }


//
}
