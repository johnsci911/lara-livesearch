<?php

namespace App\Models;

class Company extends Model
{
	protected $guarded = [];

	public function users()
	{
		return $this->hasMany(User::class);
	}
}
