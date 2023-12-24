@php
    use App\Models\User;
    use App\Http\Controllers\Session;

    
    $formLabel = ""; 
    if($status === "edit")
    {
        $formLabel = "Modification";
    }else if($status === "create")
    {
        $formLabel="Inscription";
    }else if($status === "reset")
    {
        $formLabel="Changement de mot de passe";
    }else{
        $formLabel="Conection";
    }
@endphp
@extends('layouts.main')


@section('title', 'Formulaire '.$formLabel)

@section('content') 
    @if(session('message'))
    <p class="message-alert message-success">{{ session('message') }}</p>
    @endif
    <!-- 
    Valeur de $status:
    - edit : pour modification de profile
    - create : pour creatio de profile
    - reset : pour changer de mots de passe
    - login : pour connection
    -->
    <form action="" id="" method="post">
        @csrf
        @method(($status === "edit" || $status === "reset")? "PATCH" : "POST")
        @if($status === "create" || $status === "edit")
        <div class="name-container">
            <label for="name">Surnom :</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}">
            @error('name')
            <p class="message-alert message-error">{{ $message }}</p>
            @enderror
        </div>
        @endif
        <div class="email-container">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}">
            @error('email')
            <p class="message-alert message-error">{{ $message }}</p>
            @enderror
        </div>
        @if($status === "reset" || $status === "create" || $status === "login")
        <div class="password-container">
            <label for="password">Mot de passe :</label>
            <input type="text" name="password" id="password">
            @error('password')
            <p class="message-alert message-error">{{ $message }}</p>
            @enderror
        </div>
        @error('password')
        <p class="message-alert message-error">{{ $message }}</p>
        @enderror
        @endif
        @if($status === "reset" || $status === "create")
        <div class="password-confirm-container">
            <label for="password_confirmation">Confirmation du mots de passe :</label>
            <input type="text" name="password_confirmation" id="password_confirmation">
            @error('password_confirmation')
            <p class="message-alert message-error">{{ $message }}</p>
            @enderror
        </div>
        @errorror
        @endif
        <input type="submit" value="{{ $formLabel }}">
        @if ($status === "login")
            <a href="/user/new">Creation de nouveau compte</a>
        @endif
    </form>
@endsection