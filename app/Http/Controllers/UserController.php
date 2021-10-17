<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
		$companies = Company::get(['id', 'name']);

        return view('users.edit', [
            'userId' => $user->id,
			'companies' => $companies,
        ]);
    }

    public function create()
    {
        return view('users.create');
    }
}
