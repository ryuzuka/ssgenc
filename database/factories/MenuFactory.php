<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {      
        $faker = $this->faker;
        return [
            'menu_id' => $faker->unique()->numberBetween(1, 100),
            'menu_nm' => 'menu_'.rand(1, 100),
            'menu_title' => Str::random(10).'_메뉴화면',
            'remark' => '',
            'useflag' => 'Y'
        ];
    }
}
