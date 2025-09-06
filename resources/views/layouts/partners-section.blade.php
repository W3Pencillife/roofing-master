<!-- Partners Section -->
<section class="partners-section">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">Our <span style="color: #3498db;">Partners</span></h2>
      <div class="divider"></div>
      <p class="section-description">
        Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
      </p>
    </div>
    
    <div class="partners-container">
      <div class="partner-row">
        @php
          // Directly fetch partners here
          $partners = \App\Models\Partner::all();
        @endphp

        @foreach($partners as $partner)
          <a href="{{ $partner->link ?? '#' }}" target="_blank" class="partner-item">
            <img src="{{ asset('images/' . $partner->image) }}" alt="{{ $partner->name }}" class="partner-logo">
          </a>
        @endforeach
      </div>
    </div>
  </div>
</section>

<style>
/* Section Base */
.partners-section {
  padding: 5rem 1rem;
  background: #f5f7fa;
  position: relative;
  box-shadow: 0 10px 30px rgba(0,0,0,0.08) inset;
  opacity: 0;
  transform: translateY(80px);
  transition: all 1s ease-out;
}

.partners-section.visible {
  opacity: 1;
  transform: translateY(0);
}

.container {
  max-width: 1200px;
  margin: 0 auto;
}

/* Header Styles */
.section-header {
  text-align: center;
  margin-bottom: 3rem;
}

.section-title {
  font-size: 2.5rem;
  font-weight: 700;
  color: #2c3e50;
  margin-bottom: 1rem;
  line-height: 1.3;
}

.divider {
  width: 80px;
  height: 4px;
  background: #3498db;
  margin: 1rem auto;
  border-radius: 2px;
}

.section-description {
  color: #7f8c8d;
  max-width: 700px;
  margin: 0 auto;
  line-height: 1.6;
  font-size: 1.1rem;
}

/* Partners Layout */
.partners-container {
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  max-width: 1000px;
  margin: 0 auto;
}

.partner-row {
  display: flex;
  justify-content: center;
  gap: 2rem;
  flex-wrap: wrap;
}

.partner-item {
  display: flex;
  align-items: center;
  justify-content: center;
  text-decoration: none;
  transition: all 0.3s ease;
}

.partner-logo {
  max-width: 150px;
  max-height: 80px;
  object-fit: contain;
  filter: grayscale(100%);
  opacity: 0.8;
  transition: all 0.3s ease;
}

.partner-item:hover .partner-logo {
  filter: grayscale(0%);
  opacity: 1;
}

/* Responsive */
@media (max-width: 768px) {
  .section-title {
    font-size: 2rem;
  }
  
  .partner-logo {
    max-width: 120px;
  }
  
  .partners-container {
    gap: 1rem;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const section = document.querySelector('.partners-section');

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });

  observer.observe(section);
});
</script>
