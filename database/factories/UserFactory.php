<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
	protected $model = User::class;

    public function definition()
    {
        return [
			'number_id'=>$this->faker->randomNumber(9,true),
            'name' => fake()->name(),
			'last_name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '123456789', // password
            'remember_token' => Str::random(30),
        ];
    }

	public function configure()
	 {
		 return $this->afterCreating(function(User $user){
			$user->assignRole('user');
		 });
	 }
}
