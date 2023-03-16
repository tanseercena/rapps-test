<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>
        a {
            text-decoration: none;
        }
        .login-page {
            width: 100%;
            height: 100vh;
            display: inline-block;
            display: flex;
            align-items: center;
        }
        .form-right i {
            font-size: 100px;
        }
    </style>
</head>
<body>

<div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <h3 class="mb-3">Login Now</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">

                            <div class="form-left h-100 py-5 px-5">
                                @error('token_error')
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                                <form action="{{ route("login.process") }}" method="post" class="row g-4">
                                    @csrf
                                    <div class="col-12">
                                        <label>Email<span class="text-danger">*</span></label>
                                        <div class="input-group has-validation">
                                            <div class="input-group-text"><i class="bi bi-envelope"></i></div>
                                            <input type="email" name="email" id="email" required class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="Enter Email">
                                            @if ($errors->has('email'))
                                                <div id="email" class="invalid-feedback">
                                                    {{ $errors->first('email') }}.
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label>Password<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                            <input type="password" name="password" required id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" placeholder="Enter Password">
                                            @if ($errors->has('password'))
                                                <div id="password" class="invalid-feedback">
                                                    {{ $errors->first('password') }}.
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary px-4 float-end mt-4">login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                <i class="bi bi-door-open"></i>
                                <h2 class="fs-1">Welcome Back!!!</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->

</body>
</html>
