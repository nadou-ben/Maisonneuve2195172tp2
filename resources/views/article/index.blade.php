@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <div class="container">
    <h1>@lang('lang.text_list_article')</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th>    @lang('lang.text_title')
            </th>
            <th>@lang('lang.text_content')</th>
            <th>@lang('lang.text_date')</th>
          </tr>
        </thead>
        <tbody>
          
            @forelse($articles as $article)
            <tr>
              <td>
                @if(Auth::check())
                @if(Auth::user()->id == $article->etudientId)
                <a href="{{ route('article.show', $article->id)}}">{{ ucfirst($article->titre)}}</a>
                @else
                {{ ucfirst($article->titre)}}
                @endif 
                @endif 
              </td>
              <td> {{ ucfirst($article->contenu)}}</td>
              <td> {{ ucfirst($article->created_at->format('Y-m-d')) }}</td>

            @empty
                <li class="text-warning">@lang('lang.text_no_art')</li>
                
              </tr>
            @endforelse
         
        </tbody>
      </table>
    </div>
</div>

@endsection