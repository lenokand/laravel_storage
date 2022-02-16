<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageProduct extends Model
{
    protected $fillable = ['storage_id', 'product_id'];
    protected $table = 'storage_products';

   
    // public function spaddtostorage($x){
    //     $x=1;
    //     return $x;
    // }
    // public function spaddtostorage( $request, $searchproductinstore ){
    //     if( $searchproductinstore == null){

    //         // DB::table('storage_products')->insert([
    //             StorageProduct::insert([
    
    //             'storage_id'=>$request->storage_id,
                
    //             'product_id'=> $request->product_id,
    //             'quanity'=> $request->quantity,
    //             'created_at'=> $request->created_at,
    //             'updated_at'=> $request->updated_at
           
    //         ]);
    
    
    
    //      } else {
    //         // dd($request->quantity);
    //        $searchproductinstore->where('storage_id', '=', $request->storage_id)->where('product_id', '=', $request->product_id)->update([
    //             'quanity'=> $request->quantity,
    //             // 'updated_at'=> $request->updated_at       
    //         ]);
    //         // DB::table('storage_products')->where('storage_id', '=', $request->storage_id)->where('product_id', '=', $request->product_id)->update([
    //         //     'quanity'=> $request->quantity,
    //         //     // 'updated_at'=> $request->updated_at       
    //         // ]);
    
            
          
    //      }
    // }


    use HasFactory;
}
