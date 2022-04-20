<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@gmail.com ',
            'email_verified_at' => now(),
            'password' => '$2y$10$gRB7IQ.bihpLbNhvuOAWvec.MXnJOHDc8Lt8p51126iWUssKya3/O', // password
        ];
    }
}
