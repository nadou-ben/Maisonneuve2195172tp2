@extends('Admin.main')
@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="input-group">
        <h1>@lang('lang.text_new_etud') </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('etudiant') }}" class="btn btn btn-info">@lang('lang.text_new_etud') <i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <form method="post">
        @csrf
        <div class="form">
            <div class="form-group">
                <label for="name">@lang('lang.text_non_stud'):</label>
                <input type="text" class="form-control form-control-padding" id="name" placeholder="Enter nom etudiant" name="name"  required>
              
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="adresse">@lang('lang.text_Adress'):</label>
                <input type="text" class="form-control form-control-padding" placeholder="Enter adresse" name="adresse"  id="adresse"   required>
                @if($errors->has('adresse'))
                <span class="text-danger">{{ $errors->first('adresse')}}</span>
                @endif
            </div>
            <div  class="form-group">
                <label for="tel">@lang('lang.text_phone'):</label>
                <div class="input-group">
                    <input type="tel" class="form-control form-control-padding" placeholder="Enter phone" name="phone"  id="phone"  required>
                    @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="email">@lang('lang.text_mail'):</label>
                <input type="email" class="form-control form-control-padding" placeholder="Enter email" name="email"  id="email"  required>
                @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email')}}</span>
                @endif
            </div>
            
            <div class="form-group">
                <label for="email">@lang('lang.text_birth'):</label>
                <input type="date" class="form-control form-control-padding" placeholder="Enter date" name="date_naissance"  id="date"   required>
                @if($errors->has('date_naissance'))
                <span class="text-danger">{{ $errors->first('date_naissance')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="villeId">@lang('lang.text_select_city')</label>
                <select class="form-control form-control-padding" name="villeId" id="villeId">
                  @forelse($villes as $ville)
                  <tr>
                    <option value="{{$ville->id}}" >{{ ucfirst($ville->nom)}}</option>
                  @empty
                      <li class="text-warning">@lang('lang.text_no_stud')</li>
                    </tr>
                  @endforelse
                </select>
              </div>
            <button type="submit" class="btn btn-primary mt-2 ">@lang('lang.text_add_stud')</button>
        </div>
   </form>
    </div>
</div>

@endsection