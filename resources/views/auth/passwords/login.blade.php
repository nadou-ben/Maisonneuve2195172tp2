@extends('layouts.app')
@section('content')
<main class="my-login-page">
	<div id="particles-js"><canvas class="particles-js-canvas-el" width="1409" height="456" style="width: 100%; height: 100%;"></canvas></div>
<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-md-center h-100">
			<div class="card-wrapper">
				<div class="brand">
					<img src="{{asset('assets/logoMaisonneuve.jfif')}}" alt="logo">
				</div>
				<div class="card fat">
					<div class="card-body">
						<h4 class="card-title">@lang('lang.text_login') </h4>
						<form method="POST" action="{{ route('custom.login')}}" novalidate="">
							@csrf
							@if(session()->has('success'))
								<div class="alert alert-success">
									{{ session()->get('success') }}
								</div>
							@endif
							<div class="form-group">
							<label for="email">@lang('lang.text_mail') </label>
							<input id="email" type="email" class="form-control" name="email" value="" required autofocus>
							@if($errors->has('email'))
								<span class="text-danger">{{ $errors->first('email')}}</span>
								@endif
							</div>

							<div class="form-group">
								<label for="password"> @lang('lang.text_MDP')
									<a href="{{ route('forgot')}}">
										 @lang('lang.text_MDP_forgot')
									</a>
								</label>
								<input id="password" type="password" class="form-control" name="password" required data-eye>
								@if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password')}}</span>
                                @endif
							</div>

							<div class="form-group">
								<div class="custom-checkbox custom-control">
									<input type="checkbox" name="remember" id="remember" class="custom-control-input">
									<label for="remember" class="custom-control-label">@lang('lang.text_remenber')</label>
								</div>
							</div>

							<div class="form-group m-0">
								<button type="submit" class="btn btn-primary btn-block">
									@lang('lang.text_login')
								</button>
							</div>
							<div class="mt-4 text-center">
								@lang('lang.text_no_account') <a href="{{route('registration')}}">@lang('lang.text_create_account')</a>
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
