@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <form  method="post" enctype="multipart/form-data">
      <h3 class="text-center mb-5">@lang('lang.text_add_doc')</h3>
        @csrf
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
      @endif
      @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
    
      <label >@lang('lang.text_add_doc_en'):</label>
        <div class="custom-file  mb-4">
          <input type="file" name="titre" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">@lang('lang.text_add_doc_en'):</label>
        </div>
        <label >@lang('lang.text_add_doc_fr'): </label>
        <div class="custom-file">
          <input type="file" name="titre_fr" class="custom-file-input" id="customFile">
          <label class="custom-file-label" for="customFile">@lang('lang.text_add_doc_fr'): </label>
      </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
          @lang('lang.text_doc_btn_add')
        </button>
        
    </form>
</div>

@endsection

