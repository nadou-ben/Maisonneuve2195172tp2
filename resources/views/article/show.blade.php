@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="container">
    <div class="input-group ">
        <h1>@lang('lang.text_art') <a class="text-primary"> {!! $article->titre_fr !!} </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('article.index') }}" class="btn btn btn-info">@lang('lang.text_list_art')<i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <div class="form-group mt-5">
        <label for="titre" class="text-success">@lang('lang.text_ar_titre_en')</label>
        <p>{{$article->titre}}</p>
    </div>
    <div class="form-group mt-5">
        <label for="titre" class="text-success">@lang('lang.text_ar_titre_fr')</label>
        <p>{{$article->titre_fr}}</p>
    </div>
  
    <div class="form-group">
        <label for="contenu" class="text-success">@lang('lang.text_cont_en')</label>
        <p>{{$article->contenu}}</p>
    </div>
    
    <div class="form-group">
        <label for="contenu" class="text-success">@lang('lang.text_cont_fr')</label>
        <p>{{$article->contenu_fr}}</p>
    </div>
    <div class="input-group">
        <div><a href="{{route('article.edit', $article->id)}}" class="btn btn-outline-primary">@lang('lang.text_edit_art')</a></div>
        <div class="ml-5">
            <form action ="{{route('article.delete', $article->id)}}"  method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">@lang('lang.text_delete_art')</button>
            </form>
        </div>
    </div>

</div>
</div>

@endsection