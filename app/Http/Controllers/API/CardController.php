<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiCardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;

class CardController extends Controller
{
    public function all()
    {
        return CardResource::collection(Card::all());
    }
    public function single(Card $card)
    {
        return CardResource::make($card);
    }
    public function store(ApiCardRequest $request)
    {
        return Card::create($request->validated())
    }
    public function update(Card $card, ApiCardRequest $request){
        // retour + FormRequest Passe
        $card->update($request->validated());
        return CardResource::make($card);
    }
    public function delete(Card $card)
    {
        return $card->delete();
        return response()->json([], 200);
    }
}
