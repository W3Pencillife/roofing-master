<!-- ==================== Navbar Section Start ==================== -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="mainNavbar">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60">
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

        <li class="nav-item mx-2">
          <a class="nav-link active fw-semibold text-white" href="#">Home</a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="#">About Us</a>
        </li>

        <!-- Services Dropdown -->
        <li class="nav-item dropdown mx-2">
          <a class="nav-link dropdown-toggle fw-semibold text-white position-relative" href="#" data-bs-toggle="dropdown" id="servicesDropdown">
            Services
            <span class="position-absolute bottom-0 start-0 w-100 bg-info"
                  style="height: 2px; transform: scaleX(0); transform-origin: right; transition: transform 0.3s ease;"></span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end p-0"
              style="min-width: 280px; background-color: white; border: none; border-radius: 8px; 
                     box-shadow: 0 10px 30px rgba(0,0,0,0.15); overflow: hidden;">

            <!-- Roofing Services -->
            <li class="px-3 pt-3">
              <h6 class="dropdown-header fw-bold mb-1 text-uppercase"
                  style="font-size: 0.75rem; letter-spacing: 1px; color: #3498db;">
                Roofing Services
              </h6>
            </li>
            <li>
              <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center" href="#">
                <i class="" style="color: #3498db;"></i> Long Run Roofing
              </a>
            </li>
            <li>
              <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center" href="#">
                <i class="" style="color: #3498db;"></i> Re-Roofing
              </a>
            </li>
            <li>
              <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center" href="#">
                <i class="" style="color: #3498db;"></i> Roof Replacement
              </a>
            </li>

            <!-- Divider -->
            <li><hr class="dropdown-divider m-0" style="border-color: #f1f1f1;"></li>

            <!-- Commercial Services -->
            <li class="px-3 pt-3">
              <h6 class="dropdown-header fw-bold mb-1 text-uppercase"
                  style="font-size: 0.75rem; letter-spacing: 1px; color: #3498db;">
                Commercial Services
              </h6>
            </li>
            <li>
              <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center" href="#">
                <i class="" style="color: #3498db;"></i> Commercial & Industrial Roofing
              </a>
            </li>
            <li>
              <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center" href="#">
                <i class="" style="color: #3498db;"></i> Commercial Skylight Replacements
              </a>
            </li>
            <li>
              <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center" href="#">
                <i class="" style="color: #3498db;"></i> New Roof
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="#">Products</a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="#">Contact Us</a>
        </li>

        <!-- Get Started Button -->
        <li class="nav-item ms-3">
          <a class="btn btn-primary fw-semibold text-white px-4 py-2" href="#"
             style="border-radius: 50px; background: linear-gradient(90deg, #3498db, #2c81ba); 
                    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3); transition: all 0.3s ease;">
            Free Quote <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- ==================== Navbar Section End ==================== -->

<style>
  /* Navbar Hover Effects */
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

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">