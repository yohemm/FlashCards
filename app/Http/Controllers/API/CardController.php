<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiCardRequest;
use App\Http\Requests\ApiCardUpdateRequest;
use App\Http\Resources\CardResource;
use App\Http\Resources\UserResource;
use App\Models\Card;
use App\Models\User;

class CardController extends Controller
{
    public function all()
    {
        // Evite requete N+1
        $cards = Card::query()
            ->with('owner')
            ->get();

        return CardResource::collection($cards);
    }
    public function show(Card $card)
    {
        return CardResource::make($card);
    }
    public function store(ApiCardRequest $request)
    {
        return CardResource::make(Card::create($request->validated()));
    }
    public function update(Card $card, ApiCardUpdateRequest $request){
        // retour + FormRequest Passe
        $card->update($request->validated());
        return CardResource::make($card);
    }
    public function cardOfPlayer(User $user){
        return CardResource::collection($user->cardsCreated);
    }
    public function destroy(Card $card)
    {
        $card->delete();
        return response()->json([], 200);
    }
    public function search(String $research)
    {
        $cardsWithUsers = DB::table('cards')
                    ->join('users', 'cards.owner_id', '=', 'users.id')
                    ->select('cards.*', 'users.*')
                    ->where('cards.question', 'ilike', '%' . $research . '%')
                    ->get();


        return UserResource::collection($cardsWithUsers);
    }
}
