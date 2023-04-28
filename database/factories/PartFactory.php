<?php

namespace Database\Factories;

use App\Models\Part;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartFactory extends Factory
{
    protected $model = Part::class;
    protected $index = 1;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'part_nm' => 'part_'.$this->index++,
            'remark' => '',
            'useflag' => 'Y'
        ];
    }
}
