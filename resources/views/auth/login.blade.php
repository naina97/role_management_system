<!doctype html>
<html lang="en" dir="ltr">

<!-- soccer/project/login.html  07 Jan 2020 03:42:43 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="favicon.ico" type="image/x-icon"/>

<title>Login</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" />

<!-- Core css -->
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/css/theme1.css')}}"/>

</head>
<body class="font-montserrat">

<div class="auth">
    <div class="auth_left">
       <div class="card">
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}
                </div>
            @endif
            <div class="text-center mb-2">
                <a class="header-brand" href="{{route('login')}}"><i class="fa fa-soccer-ball-o brand-logo"></i></a>
            </div>
            <form method="POST" action="{{route('login_store')}}">
            @csrf
                <div class="card-body">
                    <div class="card-title">Login to your account</div>
                    
                    <div class="form-group">
                        <input type="email" class="form-control email @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        {{-- <label class="form-label">Password<a href="forgot-password.html" class="float-right small">I forgot password</a></label> --}}
                        <input type="password" class="form-control password @error('password') is-invalid @enderror"  name="password" id="password" placeholder="Password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label class="custom-control custom-checkbox">
                        <input type="checkbox"  name="remember_me"  class="custom-control-input remember_me" />
                        <span class="custom-control-label">Remember me</span>
                        </label>
                    </div> --}}
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary btn-block" title="">Sign in</button>
                    </div>
                </div>
            </form>  
            <div class="text-center text-muted">
                Don't have account yet? <a href="{{route('register')}}">Sign up</a>
            </div>
        </div>  
    </div>
    <div class="auth_right full_img"></div>
</div>

<script src="{{asset('assets/bundles/lib.vendor.bundle.js')}}"></script>
<script src="{{ asset('assets/js/core.js')}}"></script>
</body>

<!-- soccer/project/login.html  07 Jan 2020 03:42:43 GMT -->
</html>