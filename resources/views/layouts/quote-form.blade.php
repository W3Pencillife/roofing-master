<div class="container-fluid elegant-form">
  <div class="row g-0">
       <!-- Left Column - Content -->
    <div class="col-md-6 form-content">
      <div class="content-inner">
       <h2>{{ $quote?->title ?? 'Default Title' }}</h2>
        <p class="lead">{{ $quote?->subtitle ?? 'Default subtitle' }}</p>
        <div class="benefits">
            <div class="benefit-item">
                <i class="bi bi-check-circle"></i>
                <span>{{ $quote?->benefit_1 ?? 'Benefit 1' }}</span>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle"></i>
                <span>{{ $quote?->benefit_2 ?? 'Benefit 2' }}</span>
            </div>
            <div class="benefit-item">
                <i class="bi bi-check-circle"></i>
                <span>{{ $quote?->benefit_3 ?? 'Benefit 3' }}</span>
            </div>
        </div>
      </div>
    </div>
    
    <!-- Right Column - Form -->
    <div class="col-md-6 form-section">
      @if(session('success'))
          <div class="alert alert-success" id="success-alert">
              {{ session('success') }}
          </div>
      @endif
      <form class="elegant-contact-form" action="{{ route('quote.send') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="John Smith" required>
        </div>
        
        <div class="form-group">
          <label for="phone">Phone Number</label>
          <input type="tel" id="phone" name="phone" class="form-control" placeholder="(123) 456-7890" required>
        </div>
        
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" class="form-control" placeholder="john@example.com" required>
        </div>
        
        <div class="form-group">
          <label for="subject">Subject</label>
          <select id="subject" name="subject" class="form-control" required>
            <option value="" disabled selected>Select your inquiry</option>
            <option>New Roof Installation</option>
            <option>Roof Repair</option>
            <option>Roof Inspection</option>
            <option>Emergency Service</option>
          </select>
        </div>
        
        <div class="form-group">
          <label for="message">Your Message</label>
          <textarea id="message" name="message" class="form-control" rows="4" placeholder="Tell us about your project" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-submit">
          Submit Request
          <i class="bi bi-arrow-right"></i>
        </button>
      </form>
    </div>
  </div>
</div>

<style>
.elegant-form {
  position: relative;
  opacity: 0;
  transform: translateY(50px);
  transition: all 0.8s cubic-bezier(0.22, 0.61, 0.36, 1);
  box-shadow: 0 30px 60px -10px rgba(0,0,0,0.2);
  border-radius: 12px;
  overflow: hidden;
  margin: 30px auto;
  max-width: 1200px;
}

.elegant-form.visible {
  opacity: 1;
  transform: translateY(0);
  box-shadow: 0 20px 40px -10px rgba(0,0,0,0.15);
}

/* Add a subtle glow when sliding up */
.elegant-form::before {
  content: '';
  position: absolute;
  bottom: -10px;
  left: 0;
  width: 100%;
  height: 20px;
  background: linear-gradient(to top, rgba(52, 152, 219, 0.1), transparent);
  z-index: -1;
  opacity: 0;
  transition: opacity 0.8s ease;
}

.elegant-form.visible::before {
  opacity: 1;
}

.form-content {
  background: #f8f9fa;
  padding: 3rem;
  display: flex;
  align-items: center;
  min-height: 100%;
}

.content-inner {
  max-width: 80%;
  margin: 0 auto;
}

.form-content h2 {
  font-weight: 600;
  color: #2c3e50;
  margin-bottom: 1.5rem;
  font-size: 1.8rem;
}

.form-content .lead {
  color: #7f8c8d;
  margin-bottom: 2rem;
  font-size: 1.1rem;
}

.benefits {
  margin-top: 2rem;
}

.benefit-item {
  display: flex;
  align-items: center;
  margin-bottom: 1rem;
  color: #34495e;
}

.benefit-item i {
  color: #3498db;
  margin-right: 10px;
  font-size: 1.2rem;
}

.form-section {
  background: white;
  padding: 3rem;
}

.elegant-contact-form {
  max-width: 80%;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 1.5rem;
}

.form-group label {
  display: block;
  margin-bottom: 0.5rem;
  color: #2c3e50;
  font-weight: 500;
  font-size: 0.95rem;
}

.form-control {
  width: 100%;
  padding: 0.8rem 1rem;
  border: 1px solid #e0e0e0;
  border-radius: 6px;
  font-size: 0.95rem;
  transition: all 0.4s ease;
}

.form-control:focus {
  border-color: #3498db;
  box-shadow: 0 0 0 3px rgba(52,152,219,0.1);
  outline: none;
}

select.form-control {
  appearance: none;
  background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
  background-repeat: no-repeat;
  background-position: right 1rem center;
  background-size: 1em;
}

.btn-submit {
  background: #3498db;
  color: white;
  border: none;
  padding: 0.9rem 2rem;
  border-radius: 6px;
  font-weight: 500;
  cursor: pointer;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
}

.btn-submit:hover {
  background: #2980b9;
  transform: translateY(-2px);
}

.btn-submit i {
  margin-left: 8px;
  transition: transform 0.3s ease;
}

.btn-submit:hover i {
  transform: translateX(3px);
}

@media (max-width: 768px) {
  .row.g-0 {
    flex-direction: column;
  }
  
  .form-content, .form-section {
    padding: 2rem;
  }
  
  .content-inner, .elegant-contact-form {
    max-width: 100%;
  }
  
  .elegant-form {
    margin: 15px;
    box-shadow: 0 15px 30px -5px rgba(0,0,0,0.1);
  }
}

@media (prefers-reduced-motion) {
  .elegant-form {
    transition: none !important;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form animation observer
    const formSection = document.querySelector('.elegant-form');
    if (formSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        });
        observer.observe(formSection);
    }

    // Quote success alert auto-hide
    const alert = document.getElementById('success-alert');
    if (alert) {
        setTimeout(() => {
            alert.style.transition = "opacity 0.5s ease, transform 0.5s ease";
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-20px)'; // slide up effect
            setTimeout(() => alert.remove(), 500);
        }, 5000);
    }
});
</script>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">