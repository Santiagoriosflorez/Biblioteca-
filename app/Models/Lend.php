<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lend extends Model
{
    use HasFactory,SoftDeletes;

	protected $fillable = [
		'customer_user_id',// Prestador
		'owner_user_id', //   Bibliotecario
		'book_id',
		'date_out',
		'date_in',
		'status',
    ];

	public function book()
	{
		return $this->belongsTo(Book::class, 'book_id', 'id');
	}

	public function customer()
	{
		return $this->belongsTo(user::class, 'customer_user_id', 'id');
	}

	public function owner()
	{
		return $this->belongsTo(user::class, 'owner_user_id', 'id');
	}
}


