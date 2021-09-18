<?php

namespace App\Models;

class Company extends Model
{
	public function users()
	{
		return $this->hasMany(User::class);
	}
}
