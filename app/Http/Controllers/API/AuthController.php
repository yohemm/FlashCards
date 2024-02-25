<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function connection(ApiUserRequest $request){
        $credentials = $request->validated();
        // dd($credentials);
        if(Auth::attempt($credentials))
        {
            /** @var User $user*/ 
            $user = User::where('email', $request['email'])->firstOrFail();

            $token = $user->createToken('api-token');
            return response()->json([
                'User'=>UserResource::make($user),
                'Token'=>$token
            ]);
        }
        return response()->json(["grosse merde"], 200);
    }
    public function logout(){
        $res = Auth::check();
        // dd(Auth::check());
        if ($res) Auth::logout();
        return response()->json($res, 200);
    }
}
