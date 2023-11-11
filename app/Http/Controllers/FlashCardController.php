<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Termwind\Components\Dd;

class FlashCardController extends Controller
{
    public function index()
    {   
        // $user->name = "adm";
        // $user->email = "email";
        // $user->password = "password";
        // $user->save();

        // $card = new Card;
        // $card->question = "Quesce qu'un commutateur ?";
        // $card->answer = "Je ne sais pas";
        // $card->ratio = 0.8;
        // $card->nb_try = 0;
        // $card->nb_try = 0;
        // $card->owner_id = 1;
        // $card->save();

        return dd(Card::all(['question', 'answer', 'explication']));
        return "<a href='".route('front',["id"=>1, "slug"=>"new-test-mgl"])."'>a</a><br>";
    }

    public function cardFront(string $slug, string $id){
        $card = Card::where("id",$id)->first();
        if($card !== null)
        {
            return dd($card);
        }
        return redirect('card');
    }

    public function cardBack(string $slug, string $id, Request $request)
    {        
        return 'card : voici le back'. $request->input('name', 'Inconnue');
    }
}
