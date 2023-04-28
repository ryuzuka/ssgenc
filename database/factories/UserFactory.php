<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    protected $index = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id' => 'test_'.rand(1, 10), //Str::random(20),
            'user_id' => 'test_'.$this->index,
            'name' => 'name_'.$this->index,
            // 'email' => Str::random(10).'@gmail.com',
            'email' => 'name_'.$this->index++.'@gmail.com',
            'password' => hash('sha256', 'password'),
            'email_yn' => 'N',
            'use_type' => '02',
            'useflag' => 'Y',
            'login_fail_cnt' => 0,
            'password_next' => now(),
            // 'login_at' => now()
            'login_at' => '2022-02-01',
            'expired_at' => '2023-12-31'
            // 'session_key' => Str::uuid('session_key'),
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
                // 'session_key' => null,
            ];
        });
    }
}
