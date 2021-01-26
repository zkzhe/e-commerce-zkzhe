<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => '1zero1146103@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$MC4azHXGeH5oZVOal2ddOeDSrMhhE.hRUMduHMpqoA9khTpW5TsXu', // password
            'remember_token' => Str::random(10),
        ];
    }
}
