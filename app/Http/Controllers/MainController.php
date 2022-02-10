<?php

namespace App\Http\Controllers;
// use DB;
use App\Models\Goodslist;
use App\Models\Products;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
 
public function index(){

    $storagesList = Storage::get();

    // $users = Goodslist::all();
    // $users = Goodslist::orderBy('name', 'desc')->get();
    $users = Goodslist::orderBy('name', 'desc')->paginate(10);
    $products = Products::orderBy('name', 'desc')->paginate(10);
    // dd($users);
    // dump($storagesList);
    return view('home', compact('users', 'products', 'storagesList'));

}


public function storage($storage = NULL){
    $storagesList = Storage::get();
    $storageObject = Storage::where('code', $storage)->first();

    // $products = Products::orderBy('name', 'desc')->paginate(10);
    $products = Products::where('storage_id', $storageObject->id )->orderBy('name', 'desc')->get();
// dump($storageObject);

    // $users = Goodslist::all();
    // $users = Goodslist::orderBy('name', 'desc')->get();
    $users = Goodslist::orderBy('name', 'desc')->paginate(5);
    // dd($users);
    return view('storage', compact('users', 'storage', 'storageObject', 'storagesList', 'products'));

}



public function product($product = NULL){
    $storagesList = Storage::get();
// dump(request());
// dump($product);

    // $users = Goodslist::all();
    // $users = Goodslist::orderBy('name', 'desc')->get();
    // $users = Goodslist::orderBy('name', 'desc')->paginate(5);
    // dd($users);
    return view('product', ['product' => $product], compact('storagesList'));

}



public function search(Request $request){
    $storagesList = Storage::get();
    $n = $request->n;
    // $users = Goodslist::where('name', 'LIKE', "%{$n}%")->orderBy('name', 'desc')->paginate(15);
    $products = Products::where('name', 'LIKE', "%{$n}%")->orderBy('name', 'desc')->paginate(15);
    // dd($n);
    return view('home', compact('products', 'storagesList'));

}
 
public function add(Request $request){
    $storagesList = Storage::get();
    // $n = $request->n;
    // $id = $request->id;
    // $users = Goodslist::where('name', 'LIKE', "%{$n}%")->orderBy('name', 'desc')->paginate(15);
    // $products = Products::where('name', 'LIKE', "%{$id}%")->orderBy('name', 'desc')->paginate(15);
    // dd($n);
    $product_name = $request->name;


    $validation = $request->validate([

        'code' => 'required|min:2|max:50',
        'description' => 'required|min:1'
    ]);

    DB::table('products')->insert([


 
        'storage_id'=> $request->storage_id,
        'code'=> $request->code,
        'name' => $request->name,
        'description' => $request->description,
   
        'image'=> Null,
        'price'=> $request->price,
        'created_at'=> $request->created_at,
        'updated_at'=> $request->updated_at
        // 'storage_id'=>'2',
        // 'code'=>'tovar123',
        // 'name' => 'kayla@example.com',
        // 'description' => 'Прекрасное описание продукта ',
   
        // 'image'=> Null,
        // 'price'=> 55,
        // 'created_at'=>'2017-07-23 00:00:00.000000',
        // 'updated_at'=>'2017-07-23 00:00:00.000000'

    ]);
    

    
    // $products = Products::where('name', 'LIKE', "%{$n}%")->orderBy('name', 'desc')->paginate(15);
    // dd($product_name);
    // return view('home', compact('products', 'storagesList'));
    // return $request;
    return view('add', compact( 'storagesList', 'product_name'));

}
    public function delete($id){
        return $id . "удалена";
    }


//
}
