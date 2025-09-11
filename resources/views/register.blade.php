<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="google-site-verification" content="b2UZJEkhwjackPbkifBGnBMKgc-FGrezDZn5BoxMx0I" />
  <title>Login - Pracfy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" media="print" onload="this.onload=null;this.media='all';">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" media="print" onload="this.onload=null;this.media='all';" />
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
@if (session('success'))
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <i class="bi bi-check2-all me-2"></i> <!-- Double tick icon -->
        <div>{{ session('success') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger d-flex align-items-center" role="alert">
        <i class="bi bi-x-circle-fill me-2"></i> <!-- Cross icon -->
        <div>{{ session('error') }}</div>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <!-- Left Arrow Link -->
    <a href="{{ url('/') }}" class="mb-4 d-inline-flex align-items-center text-decoration-none text-dark">
      <i class="bi bi-arrow-left me-2"></i> Back to Home
    </a>

    <h2 class="mb-3">Sign Up</h2>
    <p>Already Registered Account <a href="{{ route('login') }}">Sign In</a></p>

    <!-- Social Buttons -->
    <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary btn-social w-100">
      <img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" alt="Google" width="20"> Sign Up with Google
    </a>
    <div class="divider">or</div>

    <!-- Login Form -->
    <form action="{{ route('register.process') }}" method="post">
      @csrf
      <div class="row">
      <div class="col-md-6 mb-3">
        <label for="name" class="form-label">Full Name*</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="John" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="email" class="form-label">E-mail address*</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="example@mail.com" required>
      </div>
      </div>
      <div class="row">
      <div class="col-md-6 mb-3">
        <label for="password" class="form-label">Password*</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <div class="col-md-6 mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
      </div>
    </div>
      <button type="submit" class="btn btn-success w-100">Sign Up</button>
    </form>

  </div>
</div>

    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</body>
</html>
