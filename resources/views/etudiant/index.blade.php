@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="container">
    <h1>Liste des etudiants</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>phone</th>
            <th>Email</th>
            <th>date_naissance</th>
            <th>Ville</th>
          </tr>
        </thead>
        <tbody>
          
            @forelse($etudiants as $etudiant)
            <tr>
              <td> <a href="{{ route('etudiant.show', $etudiant->id)}}">{{ ucfirst($etudiant->nom)}}</a></td>
              <td> {{ ucfirst($etudiant->adresse)}}</td>
              <td> {{ ucfirst($etudiant->phone)}}</td>
              <td> {{ ucfirst($etudiant->email)}}</td>
              <td>{{ ucfirst($etudiant->date_naissance)}}</td>
              @forelse($villes as $ville)
                @if ($etudiant->villeId == $ville->id)
                <td>{{ ucfirst($ville->nom)}}</td>
                @endif
              @empty
                  <li class="text-warning">Aucun article disponible</li>
            
              @endforelse
            @empty
                <li class="text-warning">Aucun article disponible</li>
              </tr>
            @endforelse
         
        </tbody>
      </table>
    </div>
</div>

@endsection