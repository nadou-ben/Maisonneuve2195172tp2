@extends('Admin.main')
@section('content')
<div class="container-fluid">
<div class="container">
    <div class="input-group ">
        <h1>@lang('lang.text_stud') <a class="text-primary"> {!! $user->name !!} </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('etudiant') }}" class="btn btn btn-info">@lang('lang.text_list_stud')<i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <div class="form-group mt-5">
        <label for="name">@lang('lang.text_non_stud'):</label>
        <p>{{$user->name}}</p>
    </div>
    <div class="form-group">
        <label for="adresse">@lang('lang.text_Adress'):</label>
        <p>{{$user->adresse}}</p>
    </div>
    <div  class="form-group">
        <label for="tel">@lang('lang.text_phone'):</label>
        <p>{{$user->phone}}</p>
    </div>
    <div class="form-group">
        <label for="email">@lang('lang.text_mail'):</label>
        <p>{{$user->email}}</p>
    </div>
    <div class="form-group">
        <label for="email">@lang('lang.text_birth'):</label>
        <p>{{$user->date_naissance}}</p>
    </div>
    <div class="form-group">
        <label for="villeId">@lang('lang.text_select_city')</label>
        @forelse($villes as $ville)
        @if ($user->villeId == $ville->id)
        <p>{{ ucfirst($ville->nom)}}</p>
        @endif
        @empty
            <p class="text-warning">@lang('lang.text_no_stud')</p>
        @endforelse
    </div>
    <div class="input-group">
        <div><a href="{{route('etudiant.edit', $user->id)}}" class="btn btn-outline-primary">@lang('lang.text_modf_stud')</a></div>
        <div class="ml-5">
            <form action ="{{route('etudiant.delete', $user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">@lang('lang.text_sup_stud')</button>
            </form>
        </div>
    </div>

</div>
</div>

@endsection