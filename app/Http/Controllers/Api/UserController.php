<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\api\UserResource;

class UserController extends Controller
{
    public function index(){
        return UserResource::collection(User::all());
    }

    public function store(StoreUserRequest $request){
        $request->validated();
        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => "image",
            'role' => "user",
        ]);
        return response()->json("User Created");
    }

    public function update(StoreUserRequest $request, User $user)
    {
        $user->update($request->only('firstname','lastname','username','email'));
        return response()->json("User Updated");
    }

    public function show(User $user){
        return new UserResource($user);
    }

    public function destroy(User $user){
        $user->delete();
        return response()->json("User Deleted!");
    }
}
