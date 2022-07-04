@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="container">
    <div class="input-group ">
        <h1>L'etudiant <a class="text-primary"> {!! $etudient->nom !!} </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('etudiant') }}" class="btn btn btn-info">Liste des etudiants <i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <div class="form-group mt-5">
        <label for="nom">Nom etudiant:</label>
        <p>{{$etudient->nom}}</p>
    </div>
    <div class="form-group">
        <label for="adresse">Address:</label>
        <p>{{$etudient->adresse}}</p>
    </div>
    <div  class="form-group">
        <label for="tel">Telephone:</label>
        <p>{{$etudient->phone}}</p>
    </div>
    <div class="form-group">
        <label for="email">Email address:</label>
        <p>{{$etudient->email}}</p>
    </div>
    <div class="form-group">
        <label for="email">Date de Naissance:</label>
        <p>{{$etudient->date_naissance}}</p>
    </div>
    <div class="form-group">
        <label for="villeId">Select ville</label>
        @forelse($villes as $ville)
        @if ($etudient->villeId == $ville->id)
        <p>{{ ucfirst($ville->nom)}}</p>
        @endif
        @empty
            <p class="text-warning">Aucun article disponible</p>
        @endforelse
    </div>
    <div class="input-group">
        <div><a href="{{route('etudiant.edit', $etudient->id)}}" class="btn btn-outline-primary">Modifier l'etudiant</a></div>
        <div class="ml-5">
            <form method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">Supprimer l'etudiant</button>
            </form>
        </div>
    </div>

</div>
</div>

@endsection