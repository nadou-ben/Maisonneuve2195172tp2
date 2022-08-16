@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="input-group">

        <h1>    @lang('lang.text_add_article')
 </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('article.index') }}" class="btn btn btn-info">@lang('lang.text_list_article') <i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <form method="post">
        @csrf
        <div class="form">
            <div class="form-group">
                <label for="titre">@lang('lang.text_ar_titre_en')</label>
                <input type="text" class="form-control form-control-padding" id="titre" placeholder="Enter titre article" name="titre"   value="{{ old('titre')}}"required>
              
                @if($errors->has('titre'))
                <span class="text-danger">{{ $errors->first('titre')}}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="titre_fr">@lang('lang.text_ar_titre_fr')</label>
              <input type="text" class="form-control form-control-padding" id="titre_fr" placeholder="Enter nom article" name="titre_fr"   value="{{ old('titre_fr')}}"required>
            
              @if($errors->has('titre_fr'))
              <span class="text-danger">{{ $errors->first('titre_fr')}}</span>
              @endif
          </div>
            <div class="form-group">
                <label for="contenu">@lang('lang.text_cont_en')</label>
               
                <textarea placeholder="Enter contenu"  class="form-control form-control-padding"  id="contenu" name="contenu" rows="4" cols="50" value="{{ old('contenu')}}" > 
                  </textarea>
                
                @if($errors->has('contenu'))
                <span class="text-danger">{{ $errors->first('contenu')}}</span>
                @endif
            </div>
            <div class="form-group">
              <label for="contenu_fr">@lang('lang.text_cont_fr')</label>
             
              <textarea placeholder="Enter contenu "  class="form-control form-control-padding"  id="contenu_fr" name="contenu_fr" rows="4" cols="50" value="{{ old('contenu_fr')}}" > 
                </textarea>
              
              @if($errors->has('contenu_fr'))
              <span class="text-danger">{{ $errors->first('contenu_fr')}}</span>
              @endif
          </div>
            <button type="submit" class="btn btn-primary mt-2 ">@lang('lang.text_add_item')</button>
        </div>
   </form>
    </div>
</div>

@endsection