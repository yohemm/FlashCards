@php
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



<!-- 
Valeur de $status:
- edit : pour modification de profile
- create : pour creatio de profile
- reset : pour changer de mots de passe
- login : pour connection
 -->
<form action="" id="$user->id? 'edit-user' : $create? 'create-user' : 'login'" method="post">
    @csrf
    @method(($status === "update" || $status === "reset")? "PATCH" : "POST")
    @if($status === "create" || $status === "edit")
    <div class="name-container">
        <label for="name">Surnom :</label>
        <input type="text" name="name" id="name">
        @error('name')
            {{ $message }}
        @enderror
    </div>
    @endif
    @error('name')
        {{ $message }}
    @enderror
    <div class="email-container">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email">
        @error('email')
            {{ $message }}
        @enderror
    </div>
    @if($status === "reset" || $status === "create" || $status === "login")
    <div class="password-container">
        <label for="password">Mot de passe :</label>
        <input type="text" name="password" id="password">
        @error('password')
            {{ $message }}
        @enderror
    </div>
    @endif
    @if($status === "reset" || $status === "create")
    <div class="password-confirm-container">
        <label for="password_confirmation">Confirmation du mots de passe :</label>
        <input type="text" name="password_confirmation" id="password_confirmation">
        @error('password_confirmation')
            {{ $message }}
        @enderror
    </div>
    @endif
    @error('password_confirmation')
        {{ $message }}
    @enderror
    <input type="submit" value="{{ $formLabel }}">
</form>