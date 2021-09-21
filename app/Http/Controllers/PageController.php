<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

	public function show(User $user)
	{
		return view('users.show', [
			'user' => $user,
		]);
	}
}
