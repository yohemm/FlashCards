<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Requests\FormUserRequest;
use App\Http\Controllers\Controller;
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
            $request->session()->flash('message','Connection efectué !');
            // Session::flash('message', 'This is a message!'); 
            return to_route('root') ;
            // return to_route('root', ['LogSuccess' => "Connection"]);
        }
        return redirect()->back()->withInput();
    }
    public function logout(Request $request){
        if(Auth::check()){
            Auth::logout();
            $request->session()->flash('message','Déconnection efectué !');
        }else
            $request->session()->flash('message','Déconnection invalide !');
        return to_route('root') ;
    }
}
