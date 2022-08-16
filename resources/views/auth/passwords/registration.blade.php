@extends('layouts.app')
@section('content')
<main class="my-login-page">
	<div id="particles-js"><canvas class="particles-js-canvas-el" width="1409" height="456" style="width: 100%; height: 100%;"></canvas></div>
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<img src="{{asset('assets/logoMaisonneuve.jfif')}}" alt="bootstrap 4 login page">
					</div>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">@lang('lang.text_register')</h4>
							<form method="POST" action="{{ route('custom.registration') }}" novalidate="">
								@csrf
								@if(session()->has('fail'))
									<div class="alert alert-danger">
										{{ session()->get('fail') }}
									</div>
								@endif
								<div class="form-group">
									<label for="name">@lang('lang.text_name')</label>
									<input id="name" type="text" class="form-control" name="name" value="{{ old('name')}}" required autofocus>
								</div>
								
							
								<div class="form-group">
									<label for="username">@lang('lang.text_username')</label>
									<input id="username" type="text" class="form-control" name="username" value="{{ old('username')}}" required autofocus>
									
									@if($errors->has('username'))
                                    <span class="text-danger">{{ $errors->first('username')}}</span>
                                    @endif
								</div>
								<div class="form-group">
									<label for="email">@lang('lang.text_mail')</label>
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email')}}" required>
									
									@if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email')}}</span>
                                    @endif
									
								</div>

								<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
									<label for="password">@lang('lang.text_MDP')</label>
									<input id="password" type="password" class="form-control" name="password" value="{{ old('password')}}" required data-eye>
								
									@if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password')}}</span>
                                    @endif
								</div>

                                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
									<label for="password_confirmation">@lang('lang.text_conf_pass')</label>
									<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" value="{{ old('password')}}" required data-eye>
									
									@if($errors->has('password_confirmation'))
                                    <span class="text-danger">{{ $errors->first('password_confirmation')}}</span>
                                    @endif
								</div>
								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										@lang('lang.text_register')
									</button>
								</div>
								<div class="mt-4 text-center">
									@lang('lang.text_already_acc') <a href="{{route('login')}}">@lang('lang.text_login')</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2022 &mdash; Maisonneuve
					</div>
				</div>
			</div>
		</div>
	</section>
</main>
    @endsection
