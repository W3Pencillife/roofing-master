

<section class="project-section commercial-section" id="commercialProjects">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Column - Animated Image -->
      <div class="col-lg-6">
        <div class="project-image">
          <img src="{{ asset($commercialProject?->image ?? 'images/commercial-project.png') }}" 
               alt="{{ $commercialProject?->title ?? 'Commercial Roofing Project' }}" 
               class="img-fluid">
        </div>
      </div>
      
      <!-- Right Column - Text Content -->
      <div class="col-lg-6">
        <div class="project-content">
          <h2 class="project-title">{{ $commercialProject?->title ?? 'Commercial Projects' }}</h2>
          <p class="project-description">{{ $commercialProject?->description ?? 'Default commercial description...' }}</p>
          
          <ul class="project-features">
            @for($i = 1; $i <= 5; $i++)
              @if($commercialProject?->{'feature_'.$i})
                <li>
                  <span class="feature-icon">✓</span>
                  <span>{{ $commercialProject->{'feature_'.$i} }}</span>
                </li>
              @endif
            @endfor
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


<style>
/* Commercial Section Specific Styles */
.commercial-section .project-title {
  opacity: 0;
  transform: translateX(30px);
  transition: all 0.6s ease-out;
}

.commercial-section .project-description {
  opacity: 0;
  transform: translateX(30px);
  transition: all 0.6s ease-out 0.2s;
}

.commercial-section .project-features li {
  opacity: 0;
  transform: translateX(20px);
  transition: all 0.5s ease-out;
}

/* Feature items with sequential delays */
.commercial-section .project-features li:nth-child(1) { transition-delay: 0.4s; }
.commercial-section .project-features li:nth-child(2) { transition-delay: 0.5s; }
.commercial-section .project-features li:nth-child(3) { transition-delay: 0.6s; }
.commercial-section .project-features li:nth-child(4) { transition-delay: 0.7s; }
.commercial-section .project-features li:nth-child(5) { transition-delay: 0.8s; }

.commercial-section .project-image {
  opacity: 0;
  transform: translateX(-50px);
  transition: all 0.8s ease-out 0.1s;
}

/* Active state when in view */
.commercial-section.in-view .project-title,
.commercial-section.in-view .project-description,
.commercial-section.in-view .project-features li,
.commercial-section.in-view .project-image {
  opacity: 1;
  transform: translateX(0);
}

/* Mobile responsive */
@media (max-width: 992px) {
  .commercial-section .row {
    flex-direction: column-reverse;
  }
  
  .commercial-section .project-image {
    margin-bottom: 40px;
  }
  
  .commercial-section .project-title,
  .commercial-section .project-description,
  .commercial-section .project-features li {
    transform: translateX(-30px);
  }
}
</style>

<script>
// Add this to your existing JavaScript
document.addEventListener('DOMContentLoaded', function() {
  const commercialSection = document.getElementById('commercialProjects');
  
  if (commercialSection) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('in-view');
        } else {
          // Optional: Uncomment to reset animation when scrolled away
          // entry.target.classList.remove('in-view');
        }
      });
    }, { 
      threshold: 0.2,
      rootMargin: '0px 0px -100px 0px'
    });

    observer.observe(commercialSection);

    // Check if already in view on load
    window.addEventListener('load', function() {
      const rect = commercialSection.getBoundingClientRect();
      const isVisible = (rect.top <= window.innerHeight * 0.8) && 
                       (rect.bottom >= window.innerHeight * 0.2);
      if (isVisible) {
        commercialSection.classList.add('in-view');
      }
    });
  }
});
</script>