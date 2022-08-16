<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ config('app.name') }}</title>
  
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

 
    <!-- Bootstrap 4 Core CSS -->
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    
</head>
<body>
        @php $locale = session()->get('locale'); @endphp
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            
            <a class="navbar-brand" href="{{ route('welcome') }}"> @lang('lang.text_titre_site') </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">@lang('lang.text_login')</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('registration') }}">@lang('lang.text_register')</a>
                    </li>
                @else
                    
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> @lang('lang.text_profil')  </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                        @if(Auth::user()->admin == 1 )
                        <a class="dropdown-item" href="{{ route('admin.main') }}"> <i class="fa fa-btn fa-sign-out"></i>@lang('lang.text_admin')  </a>
                        @endif
                
                        <a class="dropdown-item" href="{{ route('logout')}}"> <i class="fa fa-btn fa-sign-out"></i>@lang('lang.text_out') </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-id-card" aria-hidden="true"></i> @lang('lang.text_articles')  </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="{{ route('article.index')}}"> @lang('lang.text_list_article')</a>
                        <a class="dropdown-item" href="{{ route('article.create')}}"> @lang('lang.text_add_article')</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-folder-open" aria-hidden="true"></i> @lang('lang.text_document')  </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-cyan" aria-labelledby="navbarDropdownMenuLink-4">
                        <a class="dropdown-item" href="{{ route('uploadFile.index')}}"> @lang('lang.text_list_doc')</a>
                        <a class="dropdown-item" href="{{ route('uploadFile.create')}}"> @lang('lang.text_add_doc')</a>
                    </div>
                </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link @if($locale=='en')text-primary @endif" href="{{ route('lang', 'en')}}"><span class="flag-icon flag-icon-us"> </span>@lang('lang.text_en')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link @if($locale=='fr') text-primary @endif" href="{{ route('lang', 'fr')}}"><span class="flag-icon flag-icon-fr"> </span> @lang('lang.text_fr')</a>
                </li>
            </ul>
            @if(session('success'))
        <span class="text-success">{{ session('success')}}</span>
    @endif
            </div>
        </nav>
      
          @yield('content')
       
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
           
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
          <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
          <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>
          
          <script src="{{asset('js/my-login.js')}}"></script>
          
          <script src="{{asset('js/bootstrap.min.js')}}"></script>
          <script src="{{asset('js/file.js')}}"></script>
</body>
</html>