<!-- Footer Section -->
<footer class="site-footer" style="background: linear-gradient(90deg, #1e2240, #3b3f56);">
  <div class="footer-container">
    <div class="footer-main">
      <!-- Logo and Basic Info -->
      <div class="footer-brand">
        <img src="{{ asset($siteLogo) }}" alt="Company Logo" class="footer-logo">
        <p class="footer-tagline">{{ $siteSetting->footer_tagline ?? '' }}</p>
      </div>

      <!-- Footer Navigation -->
      <div class="footer-nav">
        <!-- Services Column -->
        <div class="footer-column">
          <h3 class="footer-heading">Services</h3>
          <ul class="footer-links">
            @php
                $categories = \App\Models\Post::select('category', 'slug')->distinct()->get();
            @endphp

            @foreach($categories as $cat)
                <li>
                    <a href="{{ route('services.category', $cat->slug) }}">{{ $cat->category }}</a>
                </li>
            @endforeach
          </ul>
        </div>        
        <!-- Support Column -->
        <div class="footer-column">
          <h3 class="footer-heading">Support</h3>
          <ul class="footer-links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
        </div>
        
        <!-- Connect Column -->
        <div class="footer-column">
          <h3 class="footer-heading">Connect Us</h3>
          <div class="social-links">
            @if($siteSetting->facebook)
              <a href="{{ $siteSetting->facebook }}" class="social-icon" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
            @endif
            @if($siteSetting->twitter)
              <a href="{{ $siteSetting->twitter }}" class="social-icon" aria-label="Twitter"><i class="bi bi-twitter-x"></i></a>
            @endif
            @if($siteSetting->instagram)
              <a href="{{ $siteSetting->instagram }}" class="social-icon" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
            @endif
            @if($siteSetting->youtube)
              <a href="{{ $siteSetting->youtube }}" class="social-icon" aria-label="YouTube"><i class="bi bi-youtube"></i></a>
            @endif
            @if($siteSetting->linkedin)
              <a href="{{ $siteSetting->linkedin }}" class="social-icon" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Copyright Section -->
    <div class="copyright-section">
      <p>{{ $siteSetting->copyright_text ?? '© '.date('Y').' All rights reserved by BD Roofing.' }}</p>
    </div>
  </div>
</footer>


<style>
/* Footer Base */
.site-footer {
  color: white;
  padding: 4rem 1rem 1rem;
  font-family: 'Arial', sans-serif;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Main Footer Content */
.footer-main {
  display: flex;
  gap: 3rem;
  margin-bottom: 1rem;
  padding-bottom: 1rem;
  border-bottom: 1px solid rgba(255,255,255,0.1);
}

/* Brand Section */
.footer-brand {
  flex: 0 0 250px;
}

.footer-logo {
  max-width: 180px;
  height: auto;
  margin-bottom: 1rem;
}

.footer-tagline {
  color: #bdc3c7;
  font-size: 0.95rem;
  line-height: 1.5;
}

/* Navigation */
.footer-nav {
  display: flex;
  flex-wrap: wrap;
  gap: 2rem;
  flex: 1;
}

.footer-column {
  min-width: 150px;
}

/* Services and Support Columns (matched to your reference) */
.footer-heading {
  color: #3498db;
  font-size: 1.2rem;
  margin-bottom: 1.5rem;
  font-weight: 600;
  letter-spacing: 0.5px;
  position: relative;
  padding-bottom: 0.5rem;
}

.footer-heading::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  width: 50px;
  height: 2px;
  background: #3498db;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0 0 1.5rem 0;
}

.footer-links li {
  margin-bottom: 0.8rem;
}

.footer-links a {
  color: #ecf0f1;
  text-decoration: none;
  transition: all 0.3s ease;
  font-size: 0.95rem;
  display: inline-block;
  position: relative;
}

.footer-links a:hover {
  color: #3498db;
  transform: translateX(5px);
}

.footer-links a::after {
  content: '';
  position: absolute;
  left: 0;
  bottom: -2px;
  width: 0;
  height: 1px;
  background: #3498db;
  transition: width 0.3s ease;
}

.footer-links a:hover::after {
  width: 100%;
}

/* Social Links */
.social-links {
  display: flex;
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.social-icon {
  color: white;
  background: rgba(255,255,255,0.1);
  width: 36px;
  height: 36px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
}

.social-icon:hover {
  background: #3498db;
  transform: translateY(-3px);
}

.social-icon i {
  font-size: 1.1rem;
}

/* Copyright Section */
.copyright-section {
  text-align: center;
  color: #bdc3c7;
  font-size: 0.9rem;
  padding-top: 0.5rem;
}

/* Responsive */
@media (max-width: 768px) {
  .footer-main {
    flex-direction: column;
    gap: 2.5rem;
  }
  
  .footer-brand {
    text-align: center;
  }
  
  .footer-nav {
    flex-direction: column;
    gap: 2rem;
  }
  
  .footer-column {
    text-align: center;
  }
  
  .footer-heading::after {
    left: 50%;
    transform: translateX(-50%);
  }
  
  .social-links {
    justify-content: center;
  }
  
  .footer-links a:hover {
    transform: none;
  }
}
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">