@php
use Illuminate\Support\Facades\Auth;
@endphp
@extends('layouts.main')


@section('title', 'Acceuil')

@section('content') 
    @if(session('message'))
    <p class="message-alert message-success">{{ session('message') }}</p>
    @endif
    <h1>Bienvenue sur Flashcards</h1>
    <a href="card/new" class="btn">Créer une carte</a>
    <a href="card/" class="btn">Voir les cartes disponibles</a>
    @if (Auth::check())
        <a href="user/" class="btn">Voir le profile</a>
        <a href="logout" class="btn">Se déconnecter</a>
    @else
        <a href="login" class="btn">Se connecter</a>
    @endif
@endsection