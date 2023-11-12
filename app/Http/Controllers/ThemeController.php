<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function index(){
        return 'theme';
    }

    public function single(string $label, string $id){
        return 'single theme';
    }

    public function create(Request $request){
        return 'theme creation';
    }

    public function update(string $label,string  $id, Request $request){
        return 'theme update';
    }
}
