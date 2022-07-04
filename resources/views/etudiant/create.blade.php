@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="input-group">
        <h1>Ajouter un nouveau etudiant </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('etudiant') }}" class="btn btn btn-info">Liste des etudiants <i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <form method="post">
        @csrf
        <div class="form">
            <div class="form-group">
                <label for="uname">Nom etudiant:</label>
                <input type="text" class="form-control form-control-padding" id="nom" placeholder="Enter nom etudiant" name="nom"  required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="adresse">Address:</label>
                <input type="text" class="form-control form-control-padding" placeholder="Enter adresse" name="adresse"  id="adresse"   required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div  class="form-group">
                <label for="tel">Telephone:</label>
                <div class="input-group">
                    <input type="tel" class="form-control form-control-padding" placeholder="Enter phone" name="phone"  id="phone"  required>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Please fill out this field.</div>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control form-control-padding" placeholder="Enter email" name="email"  id="email"  required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="email">Date de Naissance:</label>
                <input type="date" class="form-control form-control-padding" placeholder="Enter date" name="date_naissance"  id="date"   required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="form-group">
                <label for="villeId">Select ville</label>
                <select class="form-control form-control-padding" name="villeId" id="villeId">
                  @forelse($villes as $ville)
                  <tr>
                    <option value="{{$ville->id}}" >{{ ucfirst($ville->nom)}}</option>
                  @empty
                      <li class="text-warning">Aucun article disponible</li>
                    </tr>
                  @endforelse
                </select>
              </div>
            <button type="submit" class="btn btn-primary mt-2 ">Ajouter un etudiant</button>
        </div>
   </form>
    </div>
</div>

@endsection