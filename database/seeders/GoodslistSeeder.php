<?php

namespace Database\Seeders;

use App\Models\Goodslist;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class GoodslistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Goodslist::factory()->count(10)->create();
       
        //factory( App\Models\Goodslist::class, 10) ->create();

        // Factory( \App\Goodslist::class)->create();
    }
}
