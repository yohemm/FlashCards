<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use App\Http\Requests\CreateCardRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Termwind\Components\Dd;

class FlashCardController extends Controller
{
    public function index()
    {
        // $card = new Card;
        // $card->question = "Quesce qu'un commutateur ?";
        // $card->answer = "Je ne sais pas";
        // $card->ratio = 0.8;
        // $card->nb_try = 0;
        // $card->nb_try = 0;
        // $card->owner_id = 1;
        // $card->save();

        // return dd($card);

        
        return "<a href='".route('card.show',["id"=>1, "slug"=>"new-test-mgl"])."'>Exemple de card</a><br>";
    }

    public function card(string $slug, string $id){
        $messages = "";
        if(session('success')){
            $messages =session('success');
        }
        $card = Card::where("id",$id)->first();
        if($card !== null)
        {
            if($slug != $card->slug)
            {
                return redirect()->route('card.show', ['slug'=>$card->slug, 'id'=>$card->id]);
            }
            return $messages.$card;
        }
        return redirect('card');
    }

    public function play(string $slug, string $id, Request $request)
    {        
        return 'card : PLAYING'. $request->input('name', 'Inconnue');
    }

    public function store(CreateCardRequest $request){
        
        
        $card = Card::create($request->validated());
        
        return redirect()->route('card.show', ['slug'=>$card->slug, 'id'=>$card->id])->with('success', "Votre carte a bien été créer");

    }
    public function create( Request $request)
    {     
        return view('card.create');
    }

    public function update(){
        return "C"
    }
}
