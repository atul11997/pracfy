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

    <h2 class="mb-3">Sign Up</h2>
    <p>Already Registered Account <a href="{{ route('login') }}">Sign In</a></p>

    <!-- Social Buttons -->
    {{-- <a href="{{ route('auth.google') }}" class="btn btn-outline-secondary btn-social w-100">
      <img src="https://cdn-icons-png.flaticon.com/512/281/281764.png" alt="Google" width="20"> Log in with Google
    </a> --}}

    <div class="divider">or</div>

    <!-- Login Form -->
    <form action="{{ route('login.process') }}" method="post">
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
        <label for="phone" class="form-label">Phone*</label>
        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Mobile Number" required>
      </div>
      </div>
      <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" placeholder="Address Here"></textarea>
      </div>
      <div class="row">
      <div class="col-md-6 mb-3">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
      </div>
      <div class="col-md-6 mb-3">
        <label for="state" class="form-label">State</label>
        <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
      </div>
    </div>
      <button type="submit" class="btn btn-success w-100">Sign Up</button>
    </form>

  </div>
</div>

    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
