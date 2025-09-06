
@php
  use App\Models\ChooseSection;
  $chooseSection = ChooseSection::with('benefits')->first();
@endphp

@if($chooseSection)
<!-- Why Choose Us Section -->
<section class="why-choose-us">
  <div class="container">
    <div class="section-header">
      <h2 class="section-title">
        {{ $chooseSection->title }} <span class="highlight">{{ $chooseSection->highlight }}</span> for Your Next Project?
      </h2>
      <div class="divider"></div>
    </div>
    
    <div class="benefits-grid">
      @foreach($chooseSection->benefits as $benefit)
        <div class="benefit-card">
          <div class="benefit-icon">
            <i class="{{ $benefit->icon }}"></i>
          </div>
          <h3>{{ $benefit->heading }}</h3>
          <p>{{ $benefit->description }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif


<style>
/* Section Base */
.why-choose-us {
  padding: 5rem 1rem;
  background: #f9fbfd;
  position: relative;
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

.highlight {
  color: #3498db;
  position: relative;
}

.highlight::after {
  content: '';
  position: absolute;
  bottom: 5px;
  left: 0;
  width: 100%;
  height: 8px;
  background: rgba(52, 152, 219, 0.2);
  z-index: -1;
}

.divider {
  width: 80px;
  height: 4px;
  background: #3498db;
  margin: 0 auto;
  border-radius: 2px;
}

/* Benefits Grid */
.benefits-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 2rem;
}

.benefit-card {
  background: white;
  border-radius: 12px;
  padding: 2rem;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
  border: 1px solid rgba(0, 0, 0, 0.03);
  text-align: center;
}

.benefit-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(52, 152, 219, 0.1);
  border-color: rgba(52, 152, 219, 0.2);
}

.benefit-icon {
  width: 70px;
  height: 70px;
  background: rgba(52, 152, 219, 0.1);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 1.5rem;
  color: #3498db;
  font-size: 1.8rem;
  transition: all 0.3s ease;
}

.benefit-card:hover .benefit-icon {
  background: #3498db;
  color: white;
  transform: scale(1.1);
}

.benefit-card h3 {
  font-size: 1.3rem;
  color: #2c3e50;
  margin-bottom: 1rem;
  font-weight: 600;
}

.benefit-card p {
  color: #7f8c8d;
  line-height: 1.6;
  font-size: 1rem;
}

/* Responsive */
@media (max-width: 768px) {
  .section-title {
    font-size: 2rem;
  }
  
  .benefits-grid {
    grid-template-columns: 1fr;
  }
  
  .benefit-card {
    padding: 1.5rem;
  }
}
</style>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">