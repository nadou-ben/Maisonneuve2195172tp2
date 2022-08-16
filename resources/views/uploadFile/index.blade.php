@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="container">
    <h1>@lang('lang.text_list_doc')</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>@lang('lang.text_title')</th>
            <th>@lang('lang.text_date')</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          
            @forelse($files as $file)
            <tr>
              <td>
                @if(Auth::check())
                @if(Auth::user()->id == $file->etudientId)
                <a href="{{ route('uploadFile.show', $file->id)}}">{{ ucfirst($file->titre)}}</a>
                @else
                {{ ucfirst($file->titre)}}
                @endif 
                @endif 
              </td>
              <td> {{ ucfirst($file->created_at->format('Y-m-d')) }}</td>
              <td><a href="{{ route('uploadFile.showPdf', $file->id)}}">@lang('lang.text_down')</a></td>

            @empty
                <li class="text-warning">@lang('lang.text_no_doc')</li>
                
              </tr>
            @endforelse
         
        </tbody>
      </table>
    </div>
</div>

@endsection