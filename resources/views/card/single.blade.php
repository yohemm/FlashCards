@php
    use App\Models\Card;
@endphp

@extends('layouts.main')


@section('title', 'Carte')
{{-- @dd(gettype($card)) --}}

@section('includes')<link rel="stylesheet" type="text/css" href="{{ asset('css/single-carte.css') }}">@endsection
@section('content')
<h1>Carte agrandie</h1>
<div class="selected-card">
    <div class="flip-card">
        <div class="flip-card-inner">
            <div class="front">
                <div class="question">
                    <p><strong>Question:</strong></p>
                    <p> {{ $card->question }} </p>
                </div>
                <br>
                <div class="author">
                    <p><strong>Auteur:</strong></p>
                    <p> {{ $card->owner->name }} </p>
                </div>
            </div>
            <div class="back">
                <div class="answer">
                    <p><strong>Réponse:</strong></p>
                    <p> {{ $card['answer'] }} </p>
                </div>
                <div class="explanation">
                    <p><strong>Explication:</strong></p>
                    <p> {{ $card['explication'] }} </p>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="/" class="btn-link">Retour à la page d'accueil</a>
@endsection

