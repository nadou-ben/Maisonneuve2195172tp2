@extends('auth.passwords.index')
@section('content')
<section class="h-100">
	<div class="container h-100">
		<div class="row justify-content-md-center h-100">
			<div class="card-wrapper">
				<div class="brand">
					<img src="{{asset('assets/logoMaisonneuve.jfif')}}" alt="logo">
				</div>
				<div class="card fat">
					<div class="card-body">
        <div class="row">
            <div class="" style="margin-top: 45px;">
                  <h4>@lang('lang.text_MDP_forgot')</h4><hr>
                  <form action="{{ route('password.forgot') }}" method="post" autocomplete="off">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                    @csrf
                    <p>
                        @lang('lang.text_reset_psw')
                    </p>
                      <div class="form-group">
                          <label for="email"> @lang('lang.text_mail')
                        </label>
                          <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                      </div>
                      <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary"> @lang('lang.text_Reset_psw_link')</button>
                      </div>
                      <br>
                      <a href="{{ route('login') }}">@lang('lang.text_login')</a>
                  </form>
            </div>
       
</div>
</div>
<div class="footer">
	Copyright &copy; 2022 &mdash; Maisonneuve 
</div>
</div>
</div>
</div>
</section>
	@endsection