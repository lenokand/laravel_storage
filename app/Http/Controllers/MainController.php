<?php

namespace App\Http\Controllers;

use App\Models\Goodslist;
use App\Models\Storage;
use Illuminate\Http\Request;

class MainController extends Controller
{
 
public function index(){

    $storagesList = Storage::get();

    // $users = Goodslist::all();
    // $users = Goodslist::orderBy('name', 'desc')->get();
    $users = Goodslist::orderBy('name', 'desc')->paginate(10);
    // dd($users);
    // dump($storagesList);
    return view('home', compact('users', 'storagesList'));

}


public function storage($storage = NULL){
    $storagesList = Storage::get();
    $storageObject = Storage::where('code', $storage)->first();

// dump($storageObject);

    // $users = Goodslist::all();
    // $users = Goodslist::orderBy('name', 'desc')->get();
    $users = Goodslist::orderBy('name', 'desc')->paginate(5);
    // dd($users);
    return view('storage', compact('users', 'storage', 'storageObject', 'storagesList'));

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
    $users = Goodslist::where('name', 'LIKE', "%{$n}%")->orderBy('name', 'desc')->paginate(15);
    // dd($n);
    return view('home', compact('users', 'storagesList'));

}
    //
}
