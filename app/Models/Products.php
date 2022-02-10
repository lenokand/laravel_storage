<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    // public function getStorage()
    // {
    //     // $storage = Storage::where('id', $this->storage_id)->first();
    //     // $storage = Storage::find( $this->storage_id);
    //     // dd($storage);
    //     return Storage::find( $this->storage_id);
    // }
    public function storage(){
      return  $this->belongsTo( Storage::class );
    //   return  $this->belongsToMany( Storage::class );
    }
}
