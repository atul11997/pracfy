<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - WebWave</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />
  <style>
    body, html {
      height: 100%;
    }
    .login-container {
      height: 100vh;
    }
    .login-image {
      background: url("{{ url('/') }}/assets/img/login_image.jpg");
      background-repeat: no-repeat;
      object-fit: cover;
    }
    .login-form {
      padding: 40px;
    }
    .btn-social {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      margin-bottom: 10px;
    }
    .divider {
      display: flex;
      align-items: center;
      text-align: center;
      margin: 20px 0;
    }
    .divider::before, .divider::after {
      content: '';
      flex: 1;
      height: 1px;
      background: #ddd;
    }
    .divider::before {
      margin-right: .5em;
    }
    .divider::after {
      margin-left: .5em;
    }
  </style>
</head>
<body>

  <div class="container-fluid login-container">
    <div class="row h-100">

      <!-- Left Image Section -->
      <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center login-image">
        <!-- Optional: Add overlay text/logo -->
      </div>

      <!-- Right Login Form -->
<!-- Right Login Form -->
<div class="col-lg-4 d-flex align-items-center">
  <div class="w-100 login-form">
    
    <!-- Left Arrow Link -->
    <a href="{{ url('/') }}" class="mb-4 d-inline-flex align-items-center text-decoration-none text-dark">
      <i class="bi bi-arrow-left me-2"></i> Back to Home
    </a>

    <h2 class="mb-3">Log in</h2>
    <p>Don't have an account yet? <a href="{{ route('register') }}">Sign Up</a></p>

    <!-- Social Buttons -->
    <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary btn-social w-100">
      <img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" alt="Google" width="20"> Log in with Google
    </a>

    <div class="divider">or</div>

    <!-- Login Form -->
    <form action="{{ route('login.process') }}" method="post">
      @csrf
      <div class="mb-3">
        <label for="email" class="form-label">E-mail address*</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password*</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="form-check">
          <input class="form-check-input" name="remember_me" type="checkbox" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <a href="#">Don't remember your password?</a>
      </div>
      <button type="submit" class="btn btn-success w-100">Log in via email →</button>
    </form>

  </div>
</div>

    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
