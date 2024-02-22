<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiCardRequest;
use App\Http\Requests\ApiCardUpdateRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use App\Models\User;

class CardController extends Controller
{
    public function all()
    {
        return CardResource::collection(Card::all());
    }
    public function show(Card $card)
    {
        return CardResource::make($card);
    }
    public function store(ApiCardRequest $request)
    {
        return Card::create($request->validated());
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
        return $card->delete();
        return response()->json([], 200);
    }
}
