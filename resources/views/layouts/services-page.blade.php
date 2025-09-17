<!-- resources/views/post.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a5276;
            --secondary-color: #2e86c1;
            --accent-color: #f39c12;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .hero {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url({{ $post->image ? asset('images/' . $post->image) : 'https://picsum.photos/1200/600' }});
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .hero h1 { font-size: 2.8rem; font-weight: 700; margin-bottom: 20px; }
        .hero p { font-size: 1.2rem; max-width: 700px; margin: 0 auto 30px; }

        .btn-primary {
            background-color: var(--accent-color);
            border-color: var(--accent-color);
            padding: 12px 30px;
            font-weight: 600;
            border-radius: 30px;
        }
        .btn-primary:hover {
            background-color: #e67e22;
            border-color: #e67e22;
        }

        .section-title { text-align: center; margin-bottom: 50px; color: var(--primary-color); position: relative; padding-bottom: 15px; }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background-color: var(--accent-color);
        }

        .about-section { background-color: var(--light-color); padding: 80px 0; }
        .pricing-section { padding: 80px 0; }
        .card { border: none; border-radius: 8px; box-shadow: 0 5px 15px rgba(0,0,0,0.1); }
        .card-title { color: var(--primary-color); font-weight: 700; }
        .price { color: var(--secondary-color); font-size: 2.5rem; font-weight: 700; }
        .contact-section { background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1518791841217-8f162f1e1131?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover; background-position: center; color: white; padding: 80px 0; }
        footer { background-color: var(--dark-color); color: white; padding: 40px 0 20px; }
    </style>
</head>
<body>

    @include('layouts.navbar')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>{{ $post->title }} @if($post->subtitle1) : {{ $post->subtitle1 }} @endif</h1>
            @if($post->subcontent1)
                <p>{{ $post->subcontent1 }}</p>
            @endif
        </div>
    </section>

     <!-- About Section with Slide Animations -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                    @if($post->subtitle2)
                        <h2 class="section-title text-start">{{ $post->subtitle2 }}</h2>
                    @endif
                    <p>{!! nl2br(e($post->content)) !!}</p>
                </div>
                <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000">
                    <img src="{{ $post->image ? asset('images/' . $post->image) : 'https://picsum.photos/600/400' }}" alt="Dynamic Image" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section with Slide Up -->
    @if($post->subtitle3 || $post->subcontent2)
    <section id="pricing" class="pricing-section">
        <div class="container" data-aos="fade-up" data-aos-duration="1200">
            @if($post->subtitle3)
                <h2 class="section-title">{{ $post->subtitle3 }}</h2>
            @endif
            @if($post->subcontent2)
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card mb-4">
                        <div class="card-body text-center p-5">
                            <p>{{ $post->subcontent2 }}</p>
                            <a href="/contact-us" class="btn btn-primary mt-3">Connect With Us Today</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>
    @endif

    @include('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
