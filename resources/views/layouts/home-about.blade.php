<!-- ==================== About Section ==================== -->

<section class="compact-about">
    <div class="about-bg-blur"></div>

    <div class="about-container">
        <div class="about-content">
            <!-- Title -->
            <h2 class="about-title animate-hidden">{{ $homeAbout?->title ?? 'About Us' }}</h2>
            <div class="about-divider"></div>

            <!-- Description -->
            <p class="about-description" id="about-text">
                {{ $homeAbout?->description ?? 'Default about description...' }}
            </p>

            <!-- Features -->
            <div class="about-features">
                <div class="feature-card">
                    <i class="bi bi-shield-check"></i>
                    <span>{{ $homeAbout?->feature_1 ?? 'Feature 1' }}</span>
                </div>
                <div class="feature-card">
                    <i class="bi bi-people"></i>
                    <span>{{ $homeAbout?->feature_2 ?? 'Feature 2' }}</span>
                </div>
                <div class="feature-card">
                    <i class="bi bi-house-heart"></i>
                    <span>{{ $homeAbout?->feature_3 ?? 'Feature 3' }}</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Styles -->
<style>
/* SECTION BASE */
.compact-about {
  position: relative;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(4px);
  padding: 2.5rem;
  text-align: center;
  color: white;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.about-bg-blur {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: url('{{ asset("images/roofing-bg.jpg") }}') center/cover no-repeat;
  filter: blur(8px) brightness(0.85);
  z-index: 0;
}

.about-container {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem;
  z-index: 1;
}

/* CONTENT */
.about-title {
  font-size: 2.2rem;
  font-weight: 700;
  margin-bottom: 1.2rem;
}

.about-divider {
  width: 60px;
  height: 3px;
  background: #3498db;
  margin: 0 auto 1.8rem;
  border-radius: 2px;
}

.about-description {
  font-size: 1.05rem;
  line-height: 1.7;
  margin: 0 auto 2rem;
  max-width: 700px;
}

/* FEATURES */
.about-features {
  display: flex;
  justify-content: center;
  gap: 1.2rem;
  flex-wrap: wrap;
}

.feature-card {
  background: rgba(52, 152, 219, 0.8);
  padding: 1rem 1.5rem;
  border-radius: 8px;
  display: flex;
  align-items: center;
  transition: all 0.3s ease;
}

.feature-card:hover {
  transform: translateY(-3px);
  background: rgba(41, 128, 185, 0.9);
}

.feature-card i {
  font-size: 1.3rem;
  margin-right: 10px;
}

/* ANIMATIONS */
.animate-hidden {
  opacity: 0;
  transform: translateY(40px);
}

.animate-slide-up {
  animation: slideUp 0.8s forwards ease-out;
}

@keyframes slideUp {
  from { opacity: 0; transform: translateY(40px); }
  to   { opacity: 1; transform: translateY(0); }
}

/* Word-by-word fade-in */
.about-description span {
  opacity: 0;
  display: inline-block;
}

.about-description span.visible {
  animation: fadeIn 0.4s forwards;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to   { opacity: 1; }
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .compact-about { padding: 3rem 0; }
  .about-content { padding: 1.8rem; }
  .about-title { font-size: 1.8rem; }
  .about-features {
    flex-direction: column;
    align-items: center;
    gap: 0.8rem;
  }
  .feature-card {
    width: 100%;
    max-width: 250px;
    justify-content: center;
  }
}
</style>

<!-- Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Animate title
        const title = entry.target.querySelector('.about-title');
        if (title) title.classList.add('animate-slide-up');

        // Animate description word by word
        const desc = entry.target.querySelector('#about-text');
        if (desc && !desc.dataset.animated) {
          const text = desc.innerText.trim();
          desc.innerHTML = text.split(" ").map(word => `<span class="word">${word}&nbsp;</span>`).join("");
          desc.querySelectorAll(".word").forEach(span => {
            span.classList.add("visible");
          });
          desc.dataset.animated = "true";
        }
      }
    });
  }, { threshold: 0.3 });

  observer.observe(document.querySelector('.compact-about'));
});
</script>


<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<!-- Other Includes -->
@include('layouts.residential-project')
@include('layouts.commercial-project')
@include('layouts.home-discover')
@include('layouts.choose-section')
@include('layouts.partners-section')
