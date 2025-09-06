@php
  use App\Models\HomeDiscover;
  $homeDiscover = HomeDiscover::first();
@endphp

@if($homeDiscover)
<!-- Discover Section -->
<section class="compact-discover">
  <div class="discover-bg-blur"></div>
  <div class="discover-container">
    <div class="discover-content">
      <!-- Title -->
      <h2 class="discover-title animate-hidden">{{ $homeDiscover->title }}</h2>
      <div class="discover-divider"></div>

      <!-- Description -->
      <p class="discover-description" id="discover-text">
        {{ $homeDiscover->description }}
      </p>

      <!-- Button -->
      <a href="{{ $homeDiscover->button_link }}" class="cta-primary">
        {{ $homeDiscover->button_text }}
      </a>
    </div>
  </div>
</section>
@endif



<!-- Styles -->
<style>
/* SECTION BASE */
.compact-discover {
  position: relative;
  background: rgba(0, 0, 0, 0.7);
  backdrop-filter: blur(4px);
  padding: 2.5rem;
  text-align: center;
  color: white;
  box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
}

.discover-bg-blur {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: url('{{ asset("images/roofing-bg.jpg") }}') center/cover no-repeat;
  filter: blur(8px) brightness(0.85);
  z-index: 0;
}

.discover-container {
  position: relative;
  max-width: 1200px;
  margin: 0 auto;
  padding: 2rem;
  z-index: 1;
}

/* CONTENT */
.discover-title {
  font-size: 2.2rem;
  font-weight: 700;
  margin-bottom: 1.2rem;
  line-height: 1.3;
}

.discover-divider {
  width: 60px;
  height: 3px;
  background: #3498db;
  margin: 0 auto 1.8rem;
  border-radius: 2px;
}

.discover-description {
  font-size: 1.05rem;
  line-height: 1.7;
  margin: 0 auto 2rem;
  max-width: 700px;
}

/* UPDATED BUTTON STYLES */
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
}

.cta-primary:hover {
  background: transparent;
  transform: translateY(-3px);
  box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
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
.discover-description span {
  opacity: 0;
  display: inline-block;
}

.discover-description span.visible {
  animation: fadeIn 0.4s forwards;
}

@keyframes fadeIn {
  from { opacity: 0; }
  to   { opacity: 1; }
}

/* RESPONSIVE */
@media (max-width: 768px) {
  .compact-discover { padding: 3rem 0; }
  .discover-content { padding: 1.8rem; }
  .discover-title { font-size: 1.8rem; }
  .cta-primary {
    padding: 0.8rem 1.8rem;
    font-size: 0.95rem;
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
        const title = entry.target.querySelector('.discover-title');
        if (title) title.classList.add('animate-slide-up');

        // Animate description
        const desc = entry.target.querySelector('#discover-text');
        if (desc && !desc.dataset.animated) {
          const text = desc.innerText.trim();
          desc.innerHTML = text.split(" ").map(word => `<span>${word}&nbsp;</span>`).join("");
          desc.querySelectorAll("span").forEach((span, i) => {
            setTimeout(() => span.classList.add("visible"), i * 120);
          });
          desc.dataset.animated = "true";
        }
      }
    });
  }, { threshold: 0.3 });

  observer.observe(document.querySelector('.compact-discover'));
});
</script>