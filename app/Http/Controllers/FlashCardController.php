<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlashCardController extends Controller
{
    public function index()
    {
        return "<a href='".route('front',["id"=>1, "slug"=>"new-test-mgl"])."'>a</a>";
    }

    public function cardFront(string $slug, string $id){
        return "<a href='".route('front',["id"=>1, "slug"=>"new-test-mgl"])."'>a</a>";
    }

    public function cardBack(string $slug, string $id, Request $request)
    {        
        return 'card : voici le back'. $request->input('name', 'Inconnue');
    }
}
