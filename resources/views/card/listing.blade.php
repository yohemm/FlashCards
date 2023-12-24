@php
    use App\Models\Card;
    $cards = Card::All();
@endphp

@extends('layouts.main')


@section('title', 'Cartes')


@section('includes') 
<link rel="stylesheet" type="text/css" href="{{ asset('css/carte.css') }}">
@endsection
@section('content') 

    
    <h1>Liste des cartes disponibles</h1>
    @if (count($cards) > 0)     
        <ul>
            @foreach ($cards as $card)     
                <li>
                    <a href="<?=$card['slug'] ?>-<?=$card['id']?>">
                        <div class="front">
                            <p><strong>Question:</strong> <?php echo $card['question']; ?></p>
                        </div>
                        <div class="back">
                            <p><strong>Réponse:</strong> <?php echo $card['answer']; ?></p>
                            <p><strong>Explication:</strong> <?php echo $card['explication']; ?></p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Aucune carte disponible pour le moment.</p>
    @endif
    <a href="/" class="btn-link">Retour à la page d'accueil</a>

@endsection