<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function userPage(Request $request, string $id = null)
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

        // $model = new User();
        // $model->name ="admin";
        // $model->password ="admin";
        // $model->email ="admin@a.dm";
        // $model->save();

        return dd(User::all());

        $user = User::where("id", $id)->first();
        echo("user : ".dd($user));
        
        if($user !== null)
        {
            return dd($user);
        }
        echo("Error User not found!");
        return redirect('/');
    }
}
