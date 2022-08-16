@extends('Admin.main')
@section('content')
<div class="container-fluid">
  <div class="container">
    <div class="input-group">
        <h1>@lang('lang.text_stud') <a class="text-primary"> {!! $user->name !!} </a></h1>
        <div class="btn pull-right  ml-5"><a href="{{ route('etudiant') }}" class="btn btn btn-info">@lang('lang.text_list_stud') <i class="zmdi zmdi-long-arrow-right ml-5"></i></a></div>
    </div>
    <form method="post">
        @csrf
        @method('PUT')
        <div class="form">
            <div class="form-group">
                <label for="name">@lang('lang.text_non_stud'):</label>
                <input type="text" class="form-control form-control-padding" id="name" placeholder="Enter nom etudiant" name="name" value="{{$user->name}}" required>
                @if($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="adresse">@lang('lang.text_Adress'):</label>
                <input type="text" class="form-control form-control-padding" placeholder="Enter adresse" name="adresse"  id="adresse" value="{{$user->adresse}}"  required>
                @if($errors->has('adresse'))
                <span class="text-danger">{{ $errors->first('adresse')}}</span>
                @endif
            </div>
            <div  class="form-group">
                <label for="tel">@lang('lang.text_phone'):</label>
                <div class="input-group">
                    <input type="tel" class="form-control form-control-padding" placeholder="Enter phone" name="phone"  id="phone" value="{{$user->phone}}"  required>
                    @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="email">@lang('lang.text_mail'):</label>
                <input type="email" class="form-control form-control-padding" placeholder="Enter email" name="email"  id="email" value="{{$user->email}}" required>
                @if($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="date">@lang('lang.text_birth'):</label>
                <input type="date" class="form-control form-control-padding" placeholder="Enter date" name="date_naissance"  id="date"  value="{{$user->date_naissance}}" required>
                @if($errors->has('date_naissance'))
                <span class="text-danger">{{ $errors->first('date_naissance')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label for="villeId">@lang('lang.text_select_city')</label>
                <select class="form-control form-control-padding" name="villeId" id="villeId">
                  @forelse($villes as $ville)
                  <tr>
                    @if ($user->villeId == $ville->id)
                    <option value="{{$ville->id}}" selected >{{ ucfirst($ville->nom)}}</option>
                    @else
                    <option value="{{$ville->id}}">{{ ucfirst($ville->nom)}}</option>
                    @endif
                  @empty
                      <li class="text-warning">@lang('lang.text_no_stud')</li>
                    </tr>
                  @endforelse
                </select>
              </div>
            <button type="submit" class="btn btn-primary mt-2 ">@lang('lang.text_submit')</button>
        </div>
   </form>
    </div>
</div>

@endsection