<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}
