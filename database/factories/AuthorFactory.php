<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
	public function definition()
	{
		return [
			'name'=>$this->faker->name(),
			'biography'=>$this->faker->paragraph()
		];
	}

	 public function configure()
	 {
		 return $this->afterCreating(function(Author $author){
			Book::Factory(8)->authorId($author)->create();
		 });
	 }
 }
