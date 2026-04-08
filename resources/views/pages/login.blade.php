<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in | Belajar Laravel 12</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page"> <div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>Admin</b>Toko</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silakan masuk untuk memulai sesi</p>

      @if($errors->any())
          <div class="alert alert-danger p-2">
              <small>{{ $errors->first() }}</small>
          </div>
      @endif

      <form action="{{ route('login.process') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
              <input type="email" name="email" class="form-control" placeholder="Email" required>
              <div class="input-group-append">
                  <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                  </div>
              </div>
          </div>
          <div class="input-group mb-3">
              <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
              <div class="input-group-append show-password" style="cursor: pointer;">
                  <div class="input-group-text">
                      <span class="fas fa-lock" id="password-lock"></span>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Sign In</button>
              </div>
          </div>
      <div class="social-auth-links text-center mt-2 mb-3">
    <p>- OR -</p>
    <a href="{{ route('register') }}" class="btn btn-block btn-success">
        Register a new membership
    </a>
</div>
        </form>
    </div>
  </div>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script>
$(document).ready(function() {
    $('.show-password').on('click', function() {
        let passwordField = $('#password');
        let passwordIcon = $('#password-lock');

        if (passwordField.attr('type') === 'password') {
            passwordField.attr('type', 'text');
            passwordIcon.attr('class', 'fas fa-unlock'); 
        } else {
            passwordField.attr('type', 'password');
            passwordIcon.attr('class', 'fas fa-lock'); 
        }
    });
});
</script>
</body>
</html>