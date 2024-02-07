<?php

namespace App\Http\Controllers\Web;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\FormUserRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function single(Request $request,string $name=null, string $id=null)
    {
        if($id == null){
            if(Auth::user())
            {
                $id = Auth::user()->id;
                
            }
        }

        $user = User::where("id", $id)->first();
        
        if($user !== null)
        {
            $userName = str_replace(" ", "_",$user->name);
            if($name !== $userName ){
                return redirect()->route('user.show', ['name'=>$userName, 'id'=>$id]);
            }
            return "  d ".$name."     <br>".$user."     <br>".$user->name.(Auth::check() && Auth::user()->id===$user->id?"<a href=\"/user/$user->id/edit\">Edit</a>":"");
        }
        
        echo("Error User not found!");
        return  redirect()->route('root');
    }

    public function create()
    {
        // $user = new User();
        // $user->name = "adm";
        // $user->email = "email@email.em";
        // $user->password = bcrypt("password");
        // $user->power = 63;
        // $user->save();
        // return 'user created id :'.$user->id;
        $user = new User();
        $user->power =7;
        return view('user.singnup', ['user'=>$user]);
    }
    
    public function store(FormUserRequest $request){
        $valid = $request->validated();
        $valid['password'] = bcrypt($valid['password']);
        $user = User::create([...$valid, "power"=>7]);
        $request->session()->flash('message','Utilisateur Créer !');
        return to_route('login');
    }
    
    public function edit(User $user){
        return view('user.edit', ['user'=>$user]);
    }
    public function update(FormUserRequest $request, User $user){
        $user->update($request->safe()->except(['password','password_confirmation']));
        $request->session()->flash('message','Utilisateur Modifier !');
        return to_route('root');
    }
    
}
