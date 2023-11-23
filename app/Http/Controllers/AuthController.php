<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login(){
        $user = new User();
        return view('user.login', ['user'=>$user]);
    }
    public function connection(FormUserRequest $request){
        // return redirect()->route('card.show', ['slug'=>'qsdfsq', 'id'=>3])->with('success', "Votre carte a bien été modifier");
        // return "<a href='".route('card.show',["id"=>1, "slug"=>"new-test-mgl"])."'>Exemple de card</a><br>";
        $credentials = $request->validated();
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('card.index'));
        }
        return redirect()->back()->withInput();
    }
    public function logout(){
        Auth::logout();
        return to_route('logout');
    }
}
