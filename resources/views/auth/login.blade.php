<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tapino - Login </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Connectez-vous à votre compte</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="email@example.com" name="username" required >
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Mot de passe</strong></label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="********" name="password"required autocomplete="current-password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            @if($error)
                                            <div class="alert alert-danger mt-3" role="alert">
                                                <span style="font-size: 15px;">  {{$error}}  </span>
                                            </div>
                                            @endif
                                            <div class="form-group">
                                               <div class="custom-control custom-checkbox ml-1">
													<input type="checkbox" class="custom-control-input" id="basic_checkbox_1" name="remember_me">
													<label class="custom-control-label" for="basic_checkbox_1">Se souvenir de moi</label>
												</div>
                                            </div>
                                            <div class="form-group">
                                                <a href="#">Mot de passe oublié?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Connectez</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('dashboard/vendor/global/global.min.js') }}"></script>
	<script src="{{ asset('dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/custom.min.js') }}"></script>
    <script src="{{ asset('dashboard/js/deznav-init.js') }}"></script>

</body>

</html>
