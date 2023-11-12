<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function single(Request $request,string $name=null, string $id=null)
    {
        if($id == null){
            echo 'id null';
            if($request->session()->has('user'))
            {
                return redirect('/');
                // $id = $request->sessions()->get('user');
                echo 'mais compte existant';
            }
            else
            {              
                $request->session()->put('user',1);
                $id = 1;
                echo 'initialisation du faux compte';
            }
        }

        $user = User::where("id", $id)->first();
        
        if($user !== null)
        {
            if($name !== $user->name){
                return redirect()->route('user.show', ['name'=>$user->name, 'id'=>$id]);
            }
            return "  d ".$name."     <br>".$user."     <br>".$user->name;
        }else{
            return "pas d'user";
        }
        echo("Error User not found!");
        return redirect('/');
    }

    public function create(Request $request)
    {
        $user = new User();
        $user->name = "adm";
        $user->email = "email";
        $user->password = "password";
        $user->power = 63;
        $user->save();
        return 'user created id :'.$user->id;
    }

    public function edit(){
        return 'update user';
    }

}
