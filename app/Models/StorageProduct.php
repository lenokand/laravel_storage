<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageProduct extends Model
{
    protected $fillable = ['storage_id', 'product_id'];
    protected $table = 'storage_products';
    use HasFactory;
}
