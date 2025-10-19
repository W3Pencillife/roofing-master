<!-- ==================== Navbar Section Start ==================== -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" id="mainNavbar">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="#">
        <img src="{{ asset($siteLogo) }}" alt="Logo" height="60">
    </a>

    <!-- Mobile Toggle -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Items -->
    <div class="collapse navbar-collapse" id="navbarMain">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">

        <li class="nav-item mx-2">
          <a class="nav-link active fw-semibold text-white" href="/">Home</a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="/about-us">About Us</a>
        </li>

        <!-- Services Dropdown -->
        <li class="nav-item dropdown mx-2">
            <a class="nav-link dropdown-toggle fw-semibold text-white position-relative" href="#" data-bs-toggle="dropdown" id="servicesDropdown">
                Services
                <span class="position-absolute bottom-0 start-0 w-100 bg-info"
                      style="height: 2px; transform: scaleX(0); transform-origin: right; transition: transform 0.3s ease;"></span>
            </a>

            <!-- Scrollable Dropdown Menu -->
            <ul class="dropdown-menu dropdown-menu-end p-0"
                style="min-width: 280px; max-height: 400px; overflow-y: auto; overflow-x: hidden; background-color: white; 
                       border: none; border-radius: 8px; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">

                <!-- Residential Services -->
                <li class="px-3 pt-3">
                    <h6 class="dropdown-header fw-bold mb-1 text-uppercase"
                        style="font-size: 0.75rem; letter-spacing: 1px; color: #3498db;">
                        Residential Services
                    </h6>
                </li>
                @php
                    $residentialServices = $residentialServices ?? collect();
                @endphp
                @forelse($residentialServices as $service)
                    <li>
                      <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center"
                        href="{{ route('services.category', ['category' => 'Residential Services', 'slug' => $service->slug]) }}">
                        {{ $service->title }}
                      </a>
                    </li>
                @empty
                    <li class="dropdown-item text-muted">No Residential Services Found</li>
                @endforelse

                <li><hr class="dropdown-divider m-0" style="border-color: #f1f1f1;"></li>

                <!-- Commercial Services -->
                <li class="px-3 pt-3">
                    <h6 class="dropdown-header fw-bold mb-1 text-uppercase"
                        style="font-size: 0.75rem; letter-spacing: 1px; color: #3498db;">
                        Commercial Services
                    </h6>
                </li>
                @php
                    $commercialServices = $commercialServices ?? collect();
                @endphp
                @forelse($commercialServices as $service)
                    <li>
                      <a class="dropdown-item py-2 px-3 text-dark d-flex align-items-center"
                        href="{{ route('services.category', ['category' => 'Commercial Services', 'slug' => $service->slug]) }}">
                        {{ $service->title }}
                      </a>
                    </li>
                @empty
                    <li class="dropdown-item text-muted">No Commercial Services Found</li>
                @endforelse
            </ul>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link fw-semibold text-white" href="/contact-us">Contact Us</a>
        </li>

        <!-- Get Started Button -->
        <li class="nav-item ms-3">
          <a class="btn btn-primary fw-semibold text-white px-4 py-2" href="/contact-us"
             style="border-radius: 50px; background: linear-gradient(90deg, #3498db, #2c81ba); 
                    box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3); transition: all 0.3s ease;">
            Get Started <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<!-- ==================== Navbar Section End ==================== -->

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Custom Scrollbar Style -->
<style>
/* Scrollbar style for dropdown menu (vertical on right) */
.dropdown-menu {
  scrollbar-width: thin;
  scrollbar-color: #3498db #f1f1f1;
}

.dropdown-menu::-webkit-scrollbar {
  width: 6px;
}

.dropdown-menu::-webkit-scrollbar-track {
  background: #f1f1f1;
  border-radius: 10px;
}

.dropdown-menu::-webkit-scrollbar-thumb {
  background-color: #3498db;
  border-radius: 10px;
}

.dropdown-menu::-webkit-scrollbar-thumb:hover {
  background-color: #2c81ba;
}
</style>
