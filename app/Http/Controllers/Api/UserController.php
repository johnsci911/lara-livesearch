<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Http\Resources\UserResource;
use App\Models\Company;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search');

        $users = User::with('company')->when(strlen($search) >= 3, function ($query) use ($search) {
            return $query
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('website', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%')
                ->orWhereHas('company', function ($query) use ($search) {
                    return $query->where('name', 'like', '%' . $search . '%');
                });
        })->paginate(10);

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        if ($request->validated()) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'website' => $request->website,
                'company_id' => $request->company_id,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            return $this->success($user, 'User is Created', 200);
        } else {
            return $this->error('Invalid Credentials', 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if ($user) {
            return response($user, 200);
        }

        return response()->json([
            'message' => 'User not found'
        ], 422);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, $id)
    {
        if ($request->validated()) {
            $user = User::whereId($id)->first();

            if ($user) {
                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'website' => $request->website,
                    'company_id' => $request->company_id,
                ]);

                return response()->json([
                    'message' => 'User is updated!',
                    'user' => $user,
                ], 201);
            }

            return response()->json([
                'message' => 'User not found',
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::whereId($id)->first();

        if ($user) {
            $user->delete();

            return response()->json([
                'message' => 'User is deleted',
            ], 200);
        }

        return response()->json([
            'message' => 'User not found',
        ], 422);
    }
}
