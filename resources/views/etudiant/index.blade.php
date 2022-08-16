@extends('Admin.main')
@section('content')
<div class="container-fluid">
  <div class="container">
    <h1>@lang('lang.text_list_stud')</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>@lang('lang.text_name')</th>
            <th>@lang('lang.text_Adress')</th>
            <th>@lang('lang.text_phone')</th>
            <th>@lang('lang.text_mail')</th>
            <th>@lang('lang.text_birth')</th>
            <th>@lang('lang.text_Town')</th>
          </tr>
        </thead>
        <tbody>
          
            @forelse($etudiants as $etudiant)
            <tr>
              <td> <a href="{{ route('etudiant.show', $etudiant->id)}}">{{ ucfirst($etudiant->name)}}</a></td>
              <td> {{ ucfirst($etudiant->adresse)}}</td>
              <td> {{ ucfirst($etudiant->phone)}}</td>
              <td> {{ ucfirst($etudiant->email)}}</td>
              <td>{{ ucfirst($etudiant->date_naissance)}}</td>
              @forelse($villes as $ville)
                @if ($etudiant->villeId == $ville->id)
                <td>{{ ucfirst($ville->nom)}}</td>
                @endif
              @empty
                  <li class="text-warning">@lang('lang.text_no_stud')</li>
            
              @endforelse
            @empty
                <li class="text-warning">@lang('lang.text_no_stud')</li>
              </tr>
            @endforelse
         
        </tbody>
      </table>
    </div>
</div>

@endsection