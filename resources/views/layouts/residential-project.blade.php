<section class="project-section" id="residentialProjects">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Column - Text Content -->
      <div class="col-lg-6 order-lg-1 order-2">
        <div class="project-content">
          <h2 class="project-title">{{ $residentialProject->title }}</h2>
          <p class="project-description">{{ $residentialProject->description }}</p>
          
          <ul class="project-features">
            @foreach(json_decode($residentialProject->features) as $feature)
              <li>
                <span class="feature-icon">✓</span>
                <span>{{ $feature }}</span>
              </li>
            @endforeach
          </ul>
        </div>
      </div>
      
      <!-- Right Column - Animated Image -->
      <div class="col-lg-6 order-lg-2 order-1">
        <div class="project-image">
          <img src="{{ asset($residentialProject->image) }}" alt="{{ $residentialProject->title }}" class="img-fluid">
        </div>
      </div>
    </div>
  </div>
</section>

<style>
.project-section {
  padding: 80px 0;
  background-color: #fff;
  position: relative;
  overflow: hidden;
}

.project-title {
  font-size: 2.2rem;
  font-weight: 700;
  color: #1a1a1a;
  margin-bottom: 1.5rem;
  position: relative;
  opacity: 0;
  transform: translateX(-30px);
  transition: all 0.6s ease-out;
}

.project-title::after {
  content: '';
  display: block;
  width: 60px;
  height: 3px;
  background: #0d6efd;
  margin: 15px 0 25px;
}

.project-description {
  font-size: 1.1rem;
  line-height: 1.7;
  color: #555;
  margin-bottom: 2rem;
  opacity: 0;
  transform: translateX(-30px);
  transition: all 0.6s ease-out 0.2s;
}

.project-features {
  list-style: none;
  padding: 0;
  margin: 0;
}

.project-features li {
  font-size: 1rem;
  color: #333;
  margin-bottom: 1rem;
  display: flex;
  align-items: center;
  opacity: 0;
  transform: translateX(-20px);
  transition: all 0.5s ease-out;
}

/* Feature items with sequential delays */
.project-features li:nth-child(1) { transition-delay: 0.4s; }
.project-features li:nth-child(2) { transition-delay: 0.5s; }
.project-features li:nth-child(3) { transition-delay: 0.6s; }
.project-features li:nth-child(4) { transition-delay: 0.7s; }
.project-features li:nth-child(5) { transition-delay: 0.8s; }

.feature-icon {
  color: #0d6efd;
  font-weight: bold;
  margin-right: 12px;
  font-size: 1.2rem;
}

.project-image {
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 15px 30px rgba(0,0,0,0.1);
  opacity: 0;
  transform: translateX(50px);
  transition: all 0.8s ease-out 0.1s;
}

.project-image img {
  width: 100%;
  height: auto;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.project-image:hover img {
  transform: scale(1.03);
}

/* Active state when in view */
.project-section.in-view .project-title,
.project-section.in-view .project-description,
.project-section.in-view .project-features li,
.project-section.in-view .project-image {
  opacity: 1;
  transform: translateX(0);
}

@media (max-width: 992px) {
  .project-section {
    padding: 60px 0;
  }
  
  .project-title {
    font-size: 1.8rem;
  }
  
  .project-image {
    margin-bottom: 40px;
  }
}
</style>

<script>
// Improved intersection observer with better handling
document.addEventListener('DOMContentLoaded', function() {
  const projectSection = document.getElementById('residentialProjects');
  
  // Reset animations when section is out of view
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
      } else {
        // Reset animation when scrolled away (optional)
        // entry.target.classList.remove('in-view');
      }
    });
  }, { 
    threshold: 0.2, // Trigger when 20% of element is visible
    rootMargin: '0px 0px -100px 0px' // Adjust trigger point
  });

  if (projectSection) {
    observer.observe(projectSection);
  }

  // Alternative: Trigger on page load if already in view
  window.addEventListener('load', function() {
    const rect = projectSection.getBoundingClientRect();
    const isVisible = (rect.top <= window.innerHeight * 0.8) && 
                     (rect.bottom >= window.innerHeight * 0.2);
    if (isVisible) {
      projectSection.classList.add('in-view');
    }
  });
});
</script>