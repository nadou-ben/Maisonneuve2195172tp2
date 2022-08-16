@extends('layouts.app')
@section('content')
<div class="container-fluid">
<div class="container">
    <div class="input-group ">
        <h1>@lang('lang.text_doc')  <a class="text-primary"> {!! $file->titre_fr !!} </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('uploadFile.index') }}" class="btn btn btn-info">@lang('lang.text_list_doc') <i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <div class="form-group mt-5">
        <label for="titre" class="text-success">@lang('lang.text_title_doc_en') </label>
        <p>{{$file->titre}}</p>
    </div>
    <div class="form-group mt-5">
        <label for="titre" class="text-success">@lang('lang.text_add_doc_fr')</label>
        <p>{{$file->titre_fr}}</p>
    </div>
  
  
    <div class="input-group">
        <div><a href="{{route('uploadFile.edit', $file->id)}}" class="btn btn-outline-primary">@lang('lang.text_edit_doc')</a></div>
        <div class="ml-5">
            <form action = "{{route('uploadFile.delete', $file->id)}}"  method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-outline-danger">@lang('lang.text_delete_doc')</button>
            </form>
        </div>
    </div>

</div>
</div>

@endsection