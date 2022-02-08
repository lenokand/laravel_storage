<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GoodslistFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    public function definition( )
    {
        
        return [

            'name' => $this->faker->cityPrefix,
            'character'  => $this->faker->text($maxNbChars = 50),            
            'storagenumber'  => $this->faker->randomDigit ,
            'storagename'  => $this->faker->text($maxNbChars = 5),          
            'storageadres'  => $this->faker->address,            
            'created_at'  => $this->faker->dateTime,            
            'updated_at'  => $this->faker->dateTime            
           
        
        ];
    }
}

// $factory->define(Goodslist::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name(),
//         'character' => $faker->text($maxNbChars = 50) ,
//         'storagenumber ' => $faker->randomDigitNot(5),
//         'storagename ' => $faker->text($maxNbChars = 2),
//         'storageadres' => $faker->address
//     ];
// });