<!-- ==================== Navbar Section Start ==================== -->


@include('layouts.navbar')
<!-- ==================== Navbar Section End ==================== -->

<!-- ==================== Hero Section Start ==================== -->
<div class="home-hero d-flex align-items-center justify-content-center text-center"
     style="--hero-bg: url('{{ asset($heroBg) }}');">
  <div class="content text-white">
    <h1 class="fw-bold display-4">{{ $heroTitle }}</h1>
    <p class="lead">{{ $heroText }}</p>
    <a href="/contact-us" class="cta-primary">Get Started</a>
  </div>
</div>

<!-- ==================== Hero Section End ==================== -->


<!-- ==================== Includes ==================== -->
@include('layouts.quote-form')
@include('layouts.home-about')


<!-- ==================== Styles ==================== -->
<style>
  /* ---------------- Navbar ---------------- */
  .navbar {
    transition: all 0.4s ease;
    background: transparent !important;
  }

  .navbar.scrolled {
    background: linear-gradient(90deg, #1e2240, #3b3f56) !important;
    padding: 10px 0;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
  }

  .navbar .nav-link {
    position: relative;
    transition: all 0.3s ease;
  }

  .navbar .nav-link:hover {
    color: #0dcaf0 !important;
  }

  #servicesDropdown:hover {
    color: #0dcaf0 !important;
  }

  #servicesDropdown:hover span {
    transform: scaleX(1);
    transform-origin: left;
  }

  .dropdown-item {
    border-left: 3px solid transparent;
    transition: all 0.3s ease;
  }

  .dropdown-item:hover {
    background-color: rgba(52, 152, 219, 0.1) !important;
    color: #3498db !important;
    border-left-color: #3498db;
    transform: translateX(5px);
  }

  .btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4) !important;
  }

  /* ---------------- Hero Section ---------------- */
  .home-hero {
    position: relative;
    height: 100vh;
    width: 100%;
    overflow: hidden;
    margin-top: -90px;
    padding-top: 90px;
  }

  .home-hero::before {
      content: "";
      position: absolute;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: var(--hero-bg) no-repeat center center/cover;
      filter: blur(6px);
      transform: scale(1.1);
      animation: zoomInOut 12s infinite alternate ease-in-out;
      z-index: -1;
  }



  @keyframes zoomInOut {
    from { transform: scale(1.1); }
    to   { transform: scale(1.2); }
  }

  .home-hero .content {
    position: relative;
    z-index: 1;
    max-width: 700px;
    padding: 20px;
    background: rgba(0, 0, 0, 0.4);
    border-radius: 12px;
  }

  .cta-primary {
    display: inline-block;
    background: #3498db;
    color: white;
    padding: 0.9rem 2.2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    border: 2px solid #3498db;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    margin-top: 1rem;
    font-size: 1.1rem;
  }

  .cta-primary:hover {
    background: transparent;
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
  }

  .content-section {
    padding: 100px 0;
  }

  /* ---------------- Responsive ---------------- */
  @media (max-width: 768px) {
    .home-hero .content {
      max-width: 90%;
      padding: 15px;
    }

    .cta-primary {
      padding: 0.8rem 1.8rem;
      font-size: 1rem;
    }

    .navbar {
      background: linear-gradient(90deg, #1e2240, #3b3f56) !important;
    }

    .home-hero {
      margin-top: -80px;
      padding-top: 80px;
    }
  }
</style>


<!-- ==================== Scripts ==================== -->
<script>
  // Navbar scroll effect
  window.addEventListener('scroll', function() {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });

  // Mobile navbar always has background
  function checkMobileNavbar() {
    const navbar = document.getElementById('mainNavbar');
    if (window.innerWidth <= 768) {
      navbar.classList.add('scrolled');
    } else {
      if (window.scrollY <= 50) {
        navbar.classList.remove('scrolled');
      }
    }
  }

  // Check on load and resize
  window.addEventListener('load', checkMobileNavbar);
  window.addEventListener('resize', checkMobileNavbar);
</script>
