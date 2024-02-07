<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function all()
    {
        return CardResource::collection(Card::all());
    }
    public function single($id = null)
    {

        return CardResource::make(Card::where("id", $id)->first());
    }
}
