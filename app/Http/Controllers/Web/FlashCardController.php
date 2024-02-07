<?php

namespace App\Http\Controllers\Web;

use App\Models\Card;
use App\Models\User;
use App\Http\Requests\FormCardRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        
        return View('card.listing');
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
            return View('card.single', ['card' => $card]);
        }
        return redirect('card');
    }

    public function show(string $slug, string $id, Request $request)
    {        
        return View('card.single');
    }
    public function play(string $slug, string $id, Request $request)
    {        
        return 'card : PLAYING'. $request->input('name', 'Inconnue');
    }

    public function store(FormCardRequest $request){
        
        
        $card = Card::create($request->validated());
        dd($request->validated());
        return redirect()->route('card.show', ['slug'=>$card->slug, 'id'=>$card->id])->with('success', "Votre carte a bien été créer");

    }
    public function create( Request $request)
    {
        $card = new Card;
        $card->question = "Why you don't find the best question?";
        $card->answer = "Because is your best question!";
        return view('card.create',['card'=>$card]);
    }

    public function edit(Card $card){
        return view('card.edit', ['card' => $card]);
    }
    public function update(Card $card, FormCardRequest $request){
        $card->update($request->validated());
        return redirect()->route('card.show', ['slug'=>$card->slug, 'id'=>$card->id])->with('success', "Votre carte a bien été modifier");
    }
}
