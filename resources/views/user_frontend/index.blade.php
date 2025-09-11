<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pracfy</title>
    <meta name="google-site-verification" content="b2UZJEkhwjackPbkifBGnBMKgc-FGrezDZn5BoxMx0I" />
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <!-- For other image formats or sizes, you might include multiple link tags -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/assets/img/pracfy_logo.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('/') }}/assets/img/pracfy_logo.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('/') }}/assets/img/pracfy_logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" media="print" onload="this.onload=null;this.media='all';" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    {{-- <link href="{{ url('/') }}/frontend_user/css/style.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ url('/') }}/frontend_user/css/style.css">
</head>
<style>
.image-logo{
    width: 60px;
}
@media screen and (max-width: 567px){
    .image-logo, .navbar-brand h1{
        width: 30px;
    }
}</style>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom sticky-top py-2">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold d-flex align-items-center me-5" href="{{ route('user.index') }}">
                <img src="{{ url('/') }}/assets/img/pracfy_logo.png" class="image-logo"><h1>Pracfy</h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#">Features</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Templates</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li>
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
                Generate, customize, publish.<br>Website in 3 minutes with <span class="text-primary">Pracfy</span>
            </h1>
            <a href="{{ route('login') }}" class="btn btn-success btn-lg mt-4">
                Start for free <i class="bi bi-arrow-right"></i>
            </a>

            <div class="row justify-content-center ratings mt-5">
                <div class="col-4 col-md-2 text-center">
                    <img src="{{ url('/') }}/assets/img/product-hunt-logo-orange-240.png"
                        class="img-fluid rating-icon" alt="Product Hunt" />
                    <p class="rating-text mt-2">4.6/5</p>
                </div>
                <div class="col-4 col-md-2 text-center">
                    <img src="{{ url('/') }}/assets/img/capterra-logo.png" class="img-fluid rating-icon"
                        alt="Capterra" />
                    <p class="rating-text mt-2">4.6/5</p>
                </div>
                <div class="col-4 col-md-2 text-center">
                    <img src="{{ url('/') }}/assets/img/Google.png" class="img-fluid rating-icon" alt="Google" />
                    <p class="rating-text mt-2">4.9/5</p>
                </div>
            </div>

            <p class="text-muted mt-4">No credit card required.</p>

            <div class="mt-4">
                <img src="{{ url('/') }}/assets/img/KV.avif" class="img-fluid" alt="KeyVisual" />
            </div>
        </div>
    </section>
<section class="pricing" id="pricing">
 <div class="container pricing-table">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <h1 class="display-4 mb-3">Premium Plans</h1>
            <p class="lead">
                WebWave is a free web builder. You can use it for free for however long you want. If you will ever want to remove WebWave branding and connect your website to a custom domain, like yourcompany.com, you'll need to purchase a Starter, Pro or Business website hosting plan.
            </p>
        </div>
    </div>

        <div class="row">
            <!-- Free Plan -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card pricing-card">
                    <div class="pricing-header">
                        <h3 class="plan-name">Free</h3>
                        <div class="price-box">
                            <span class="price">$0</span>
                            <div class="per-month">USD / month</div>
                        </div>
                        <p class="plan-description">Create and publish your website for free.</p>
                        <button class="btn btn-success btn-choose">Choose</button>
                    </div>
                    
                    <div class="accordion" id="freeAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="freeHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#freeCollapse" aria-expanded="false" aria-controls="freeCollapse">
                                    More features
                                </button>
                            </h2>
                            <div id="freeCollapse" class="accordion-collapse collapse" aria-labelledby="freeHeading" data-bs-parent="#freeAccordion">
                                <div class="features-list">
                                    <div class="feature-item disabled">
                                        <span class="feature-name">Free .com domain for the first year</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">Ad-free website</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">Google submission</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">SEO Writer</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">SEO Monitoring</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">SEO Analyzer</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Blog</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">E-commerce with online payments</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">AI Website Builder</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Unlimited pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SSL certificate</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Support</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">No email hosting</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">0 GB email storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">1 GB bandwidth</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">1 GB file storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Code customization (HTML, CSS, JS)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Password-protected pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Member-only pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Multilingual websites</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Starter Plan -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card pricing-card" id="starter-pricing">
                    <div class="pricing-header">
                        <h3 class="plan-name">Starter</h3>
                        <div class="price-box">
                            <span class="original-price">$7</span>
                            <span class="price">$3.5</span>
                            <div class="per-month">USD / month</div>
                        </div>
                        <p class="plan-description">Your online business card.</p>
                        <button class="btn btn-success btn-choose">Choose</button>
                    </div>
                    
                    <div class="accordion" id="starterAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="starterHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#starterCollapse" aria-expanded="false" aria-controls="starterCollapse">
                                    More features
                                </button>
                            </h2>
                            <div id="starterCollapse" class="accordion-collapse collapse" aria-labelledby="starterHeading" data-bs-parent="#starterAccordion">
                                <div class="features-list">
                                    <div class="feature-item">
                                        <span class="feature-name">Free .com domain for the first year</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Ad-free website</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Google submission</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">SEO Writer</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">SEO Monitoring</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">SEO Analyzer</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">Blog</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">E-commerce with online payments</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">AI Website Builder</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">One-page website</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SSL certificate</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Support</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Mail (1 mailbox)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">1 GB email storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">2 GB bandwidth</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">3 GB file storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Code customization (HTML, CSS, JS)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">Password-protected pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">Member-only pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">Multilingual websites</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Pro Plan (Recommended) -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card pricing-card recommended">
                    <div class="recommended-badge">Recommended</div>
                    <div class="pricing-header">
                        <h3 class="plan-name">Pro</h3>
                        <div class="price-box">
                            <span class="original-price">$10</span>
                            <span class="price">$5</span>
                            <div class="per-month">USD / month</div>
                        </div>
                        <p class="plan-description">Feature-rich website with a blog and SEO tools.</p>
                        <button class="btn btn-success btn-choose">Choose</button>
                    </div>
                    
                    <div class="accordion" id="proAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="proHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#proCollapse" aria-expanded="false" aria-controls="proCollapse">
                                    More features
                                </button>
                            </h2>
                            <div id="proCollapse" class="accordion-collapse collapse" aria-labelledby="proHeading" data-bs-parent="#proAccordion">
                                <div class="features-list">
                                    <div class="feature-item">
                                        <span class="feature-name">Free .com domain for the first year</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Ad-free website</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Google submission</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SEO Writer (1 article mth)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SEO Monitoring (3 keyword mth)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SEO Analyzer</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Blog</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item disabled">
                                        <span class="feature-name">E-commerce with online payments</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">AI Website Builder</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Unlimited pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SSL certificate</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Support</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Mail (5 mailboxes)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">5 GB email storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Unlimited bandwidth</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">10 GB file storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Code customization (HTML, CSS, JS)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Password-protected pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Member-only pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Multilingual websites</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Business Plan -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card pricing-card">
                    <div class="pricing-header">
                        <h3 class="plan-name">Business</h3>
                        <div class="price-box">
                            <span class="original-price">$15</span>
                            <span class="price">$7.5</span>
                            <div class="per-month">USD / month</div>
                        </div>
                        <p class="plan-description">Unlimited site with no-commission e-commerce and advanced SEO.</p>
                        <button class="btn btn-success btn-choose">Choose</button>
                    </div>
                    
                    <div class="accordion" id="businessAccordion">
                        <div class="accordion-item border-0">
                            <h2 class="accordion-header" id="businessHeading">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#businessCollapse" aria-expanded="false" aria-controls="businessCollapse">
                                    Less features
                                </button>
                            </h2>
                            <div id="businessCollapse" class="accordion-collapse collapse" aria-labelledby="businessHeading" data-bs-parent="#businessAccordion">
                                <div class="features-list">
                                    <div class="feature-item">
                                        <span class="feature-name">Free .com domain for the first year</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Ad-free website</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Google submission</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SEO Writer (3 article mth)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SEO Monitoring (6 keyword mth)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SEO Analyzer</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Blog</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">E-commerce with online payments</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">AI Website Builder</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Unlimited pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">SSL certificate</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Support</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Mail (unlimited)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">20 GB email storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Unlimited bandwidth</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Unlimited file storage</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Code customization (HTML, CSS, JS)</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Password-protected pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Member-only pages</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                    <div class="feature-item">
                                        <span class="feature-name">Multilingual websites</span>
                                        <i class="fas fa-info-circle feature-icon"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
   <footer class="custom-footer">
        <div class="background-overlay"></div>
        <div class="footer-content">
            <div class="container">
                <div class="row">
                    <!-- Column 1 (element_27496) -->
                    <div class="col-lg-2 col-md-4 col-6 footer-column">
                        <h5 class="footer-heading">Products</h5>
                        <ul class="footer-links">
                            <li><a href="#">Feature 1</a></li>
                            <li><a href="#">Feature 2</a></li>
                            <li><a href="#">Pricing</a></li>
                            <li><a href="#">API</a></li>
                        </ul>
                    </div>
                    
                    <!-- Column 2 (element_27497) -->
                    <div class="col-lg-2 col-md-4 col-6 footer-column">
                        <h5 class="footer-heading">Resources</h5>
                        <ul class="footer-links">
                            <li><a href="#">Documentation</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Webinars</a></li>
                        </ul>
                    </div>
                    
                    <!-- Column 3 (element_27498) -->
                    <div class="col-lg-2 col-md-4 col-6 footer-column">
                        <h5 class="footer-heading">Company</h5>
                        <ul class="footer-links">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Careers</a></li>
                            <li><a href="#">Partners</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    
                    <!-- Column 4 (element_27499) -->
                    <div class="col-lg-2 col-md-4 col-6 footer-column">
                        <h5 class="footer-heading">Legal</h5>
                        <ul class="footer-links">
                            <li><a href="{{ route('privacy.policy') }}">Privacy</a></li>
                            <li><a href="{{ route('terms.services') }}">Terms</a></li>
                            <li><a href="https://www.freeprivacypolicy.com/">Cookie Policy</a></li>
                            <li><a href="https://gdpr-info.eu/">GDPR</a></li>
                        </ul>
                    </div>
                    
                    <!-- Group Content (group_3776) -->
                    <div class="col-lg-4 col-md-8 footer-column">
                        <h5 class="footer-heading">Stay Updated</h5>
                        <p>Subscribe to our newsletter for the latest updates</p>
                        <form class="row g-2">
                            <div class="col-8">
                                <input type="email" class="form-control" placeholder="Your email">
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary w-100">Subscribe</button>
                            </div>
                        </form>
                        <div class="social-icons mt-3">
                            <a href="#" class="text-decoration-none me-2"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="text-decoration-none me-2"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-decoration-none me-2"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#" class="text-decoration-none"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Row (element_22179) -->
                <div class="footer-bottom">
                    <p class="mb-0">© 2025 Pracfy. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" defer></script>

<script>
document.querySelectorAll('.accordion-collapse').forEach(collapse => {
    collapse.addEventListener('shown.bs.collapse', function () {
        const card = this.closest('.pricing-card');
        const button = card.querySelector('.accordion-button');

        // Change button text on expand
        button.textContent = 'Less Feature';
        card.classList.add('expanded');
    });

    collapse.addEventListener('hidden.bs.collapse', function () {
        const card = this.closest('.pricing-card');
        const button = card.querySelector('.accordion-button');

        // Change button text on collapse
        button.textContent = 'More Feature';
        card.classList.remove('expanded');
    });
});

</script>
</body>

</html>
