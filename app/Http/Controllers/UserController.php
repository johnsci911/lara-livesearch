<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

	public function show(User $user)
	{
		return view('users.show', [
			'userId' => $user->id,
		]);
	}

    public function edit(User $user)
    {
        return view('users.edit', [
            'userId' => $user->id,
        ]);
    }

    public function create()
    {
        return view('users.create');
    }
}
