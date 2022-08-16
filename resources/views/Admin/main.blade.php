<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional Theme -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet"> 
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    
</head>
<body>
  @php $locale = session()->get('locale'); @endphp
 
    <div id="viewport">
        <!-- Sidebar -->
        <div id="sidebar">
          <header> <img src="{{asset('assets/iconScolaire.png')}}" height="25" alt="scolaire Logo"
            loading="lazy" />
          <a href="{{ route('admin.main') }}">@lang('lang.text_titre_site') </a>
          </header>
          <ul class="nav">
            
            <li>
              <a href="{{ route('etudiant') }}">
                <i class="zmdi zmdi-accounts-list-alt"></i>@lang('lang.text_list_stud') 
              </a>
            </li>
            <li>
              <a href="{{ route('etudiant.create') }}">
                <i class="zmdi zmdi-accounts-add"></i>   @lang('lang.text_add_stud')

              </a>
            </li>
          </ul>
        </div>
        <!-- Content -->
        <div id="content">
          <nav class="navbar navbar-default ">
            <div class="container-fluid">
            
              <ul class="nav navbar  bg-light">
               
                <li>
                  </a><a class="nav-link"  href="{{ route('article.index') }}"><i class="fa fa-user"></i>   @lang('lang.text_profil')
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link @if($locale=='en')text-primary @endif" href="{{ route('lang', 'en')}}"><span class="flag-icon flag-icon-us"> </span>@lang('lang.text_en')</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link @if($locale=='fr') text-primary @endif" href="{{ route('lang', 'fr')}}"><span class="flag-icon flag-icon-fr"> </span> @lang('lang.text_fr')</a>
              </li>
              </ul>
            </div>
            

          </nav>
          @yield('content')
        </div>
      </div>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="{{asset('js/script.js')}}"></script>
 
</body>
</html>