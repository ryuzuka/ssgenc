<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    protected $model = Project::class;
    protected $index = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $faker = $this->faker;
        return [
            'area' => '02',
            'biz_area' => '03',
            'bf_gubun' => '04',
            'name_ko' => '프로젝트_'.$this->index,
            'name_en' => 'project_'.$this->index++,
            'main_yn' => 'Y',
            'open_yn' => '01',
            'created_id' => 'tester',
            'updated_id' => 'tester',
            'from' => now(),
            'to' => now(),
            'project_yn' => 'Y',
            'desc_ko' => '한글 설명',
            'desc_en' => 'english descriptions',
            'address_ko' => '한글 주소 예제',
            'address_en' => 'english address example',
            'volumn_ko' => '',
            'volumn_en' => '',
            'household_ko' => '',
            'household_en' => '',
            'attach_id' => 0

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
            ];
        });
    }
}