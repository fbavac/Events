@extends('auth.auth_layouts.header')

@section('content')


<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-body">
            <div class="auth-wrapper auth-v1 px-2">
                <div class="auth-inner py-2">
                    <!-- Login v1 -->
                    <div class="app-content content "></div>
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="javascript:void(0);" class="brand-logo"></a>
                            <h4 class="card-title mb-1">Welcome ! 👋</h4>
                            <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>
                            <form method="POST" action="{{ route('login') }}" class="auth-login-form mt-2">
                                @csrf
                                <div class="form-group">
                                    <label for="login-email" class="form-label">Email</label>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="login-email" name="email" placeholder="john@example.com" aria-describedby="login-email" tabindex="1" autofocus />

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="d-flex justify-content-between">
                                        <label for="login-password">Password</label>
                                    </div>
                                    <div class="input-group input-group-merge form-password-toggle">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror form-control-merge " id="login-password" name="password" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" onpaste="return false" oncopy="return false" />
                                        <div class="input-group-append">
                                            <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                                <p class="text-center mt-2">  
                                    <span>New on our platform?</span>
                                    <a href="{{ route('register') }}">
                                        <span>Create an account</span>
                                    </a>
                                </p>
                            </form><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    
    <!-- END: Content-->
    
@endsection

