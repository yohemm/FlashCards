<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FormUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function single(Request $request,string $name=null, string $id=null)
    {
        if($id == null){
            echo 'id null';
            if(Auth::user())
            {
                dd(Auth::user());
                
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

    public function create()
    {
        $user = new User();
        $user->name = "adm";
        $user->email = "email@email.em";
        $user->password = bcrypt("password");
        $user->power = 63;
        $user->save();
        return 'user created id :'.$user->id;
        $user = new User();
        return view('user.singnup', ['user'=>$user]);
    }

    public function store(FormUserRequest $request, User $user){
        $user->update($request->validated());
        return 'update user';
    }
    
    public function edit(User $user){
        return view('user.edit', ['user'=>$user]);
    }
    public function update(FormUserRequest $request, User $user){
        $user->update($request->safe()->except(['password','password_confirmation']));
        return 'update user';
    }
    
}
