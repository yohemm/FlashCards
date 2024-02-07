<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all()
    {
        return UserResource::collection(User::all());
    }
    public function single(User $user)
    {
        return UserResource::make($user);
    }
   
    public function store(ApiUserRequest $request)
    {
        return User::create($request->validated())
    }
    public function update(User $user, ApiUserRequest $request){
        // retour + FormRequest Passe
        return $user->update($request->validated());
    }
    public function delete(User $user)
    {
        return $user->delete();
    }
}
