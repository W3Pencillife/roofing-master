<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Navbar -->
    @include('layouts.navbar')

    <!-- About Section -->
    <section class="compact-about">
        <div class="about-bg-blur"></div>

        <div class="about-container">
            <div class="about-content">
                <!-- Title -->
                <h2 class="about-title">{{ $homeAbout?->title ?? 'About Us' }}</h2>
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

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- About Section Animation -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const title = entry.target.querySelector('.about-title');
                        if (title) title.classList.add('animate-slide-up');

                        const desc = entry.target.querySelector('#about-text');
                        if (desc && !desc.dataset.animated) {
                            const text = desc.innerText.trim();
                            desc.innerHTML = text.split(" ").map(word => `<span class="word">${word}&nbsp;</span>`).join("");
                            desc.querySelectorAll(".word").forEach((span, index) => {
                                setTimeout(() => span.classList.add("visible"), index * 60);
                            });
                            desc.dataset.animated = "true";
                        }
                    }
                });
            }, { threshold: 0.3 });

            observer.observe(document.querySelector('.compact-about'));
        });
    </script>
</body>
</html>
