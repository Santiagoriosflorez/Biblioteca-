<?php

namespace App\Models;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory,SoftDeletes;

	protected $fillable = [
		'name'
    ];

	/*
	  Category::whith('books',)->get();
	*/
	public function books()
	{
		return $this->hasMany(Book::class, 'category_id', 'id');
	}
}
