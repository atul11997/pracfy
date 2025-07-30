<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Pracfy</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" crossorigin="anonymous" />

  <style>
    .hero-section {
      position: relative;
       background: linear-gradient(
    180deg,
    white 30%,
    #b2edce 50%,
    #b2edce 80%,
    white 100%
  );
      padding-top: 4rem;
      padding-bottom: 4rem;
      text-align: center;
      overflow: hidden;
    }

    .hero-bg-svg {
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 100%;
      height: 100%;
      z-index: 0;
      pointer-events: none;
    }

    .hero-section > .container {
      position: relative;
      z-index: 1;
    }

    .hero-section h1 {
      font-weight: 700;
    }

    .rating-icon {
      max-height: 30px;
    }

    .rating-text {
      font-weight: 600;
    }

    .ratings .col {
      padding: 1rem;
    }

    .navbar-brand {
      font-size: 1.5rem;
    }

    .navbar-nav .nav-item {
      padding: 1rem;
    }

    .navbar-nav .nav-link {
      font-size: 16px;
      color: #000;
      font-weight: 800;
      padding: 0.5rem 1rem;
    }

    .btn-success {
      background-color: #018e3f;
      border: none;
    }

    .btn-success:hover {
      background-color: #016f32;
    }

    .display-5 {
      font-size: 82px;
      line-height: 92px;
      text-align: center;
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-2">
  <div class="container d-flex justify-content-between align-items-center">
    <a class="navbar-brand fw-bold d-flex align-items-center me-5" href="#">
      <h1>Pracfy</h1>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Templates</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Pricing</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Resources</a></li>
      </ul>

      <div class="d-flex align-items-center ms-5">
        <a href="{{ route('login') }}" class="btn btn-link text-dark text-decoration-none me-2">Log in</a>
        <a href="{{ route('register') }}" class="btn btn-success px-4">Sign up</a>
      </div>
    </div>
  </div>
</nav>

<!-- HERO SECTION -->
<section class="hero-section">
  <div class="container">
    <h1 class="display-5">
      Generate, customize, publish.<br>Website in 3 minutes with <span class="text-primary">WebWave AI.</span>
    </h1>
    <a href="#" class="btn btn-success btn-lg mt-4">
      Start for free <i class="bi bi-arrow-right"></i>
    </a>

    <div class="row justify-content-center ratings mt-5">
      <div class="col-4 col-md-2 text-center">
        <img src="{{ url('/') }}/assets/img/product-hunt-logo-orange-240.png" class="img-fluid rating-icon" alt="Product Hunt" />
        <p class="rating-text mt-2">4.6/5</p>
      </div>
      <div class="col-4 col-md-2 text-center">
        <img src="{{ url('/') }}/assets/img/capterra-logo.png" class="img-fluid rating-icon" alt="Capterra" />
        <p class="rating-text mt-2">4.6/5</p>
      </div>
      <div class="col-4 col-md-2 text-center">
        <img src="{{ url('/') }}/assets/img/Google.png" class="img-fluid rating-icon" alt="Google" />
        <p class="rating-text mt-2">4.9/5</p>
      </div>
    </div>

    <p class="text-muted mt-4">No credit card required.</p>

    <div class="mt-4">
      <img src="{{ url('/') }}/assets/img/KV.png" class="img-fluid" alt="KeyVisual" />
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
