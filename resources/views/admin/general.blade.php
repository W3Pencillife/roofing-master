@extends('admin.admin-layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>General Settings</h6>
                    <button class="btn btn-primary" id="saveAllSettings">Save All Changes</button>
                </div>
                <div class="card-body">
                    <p>Manage your website's homepage content from this panel.</p>
                    
                    <!-- Tabs for different sections -->
                    <ul class="nav nav-tabs" id="settingsTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="hero-tab" data-bs-toggle="tab" data-bs-target="#hero" type="button" role="tab">Hero Section</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="about-tab" data-bs-toggle="tab" data-bs-target="#about" type="button" role="tab">About Section</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="discover-tab" data-bs-toggle="tab" data-bs-target="#discover" type="button" role="tab">Discover Section</button>
                        </li>
                    </ul>
                    
                    <div class="tab-content mt-4" id="settingsTabContent">
                        <!-- Hero Section Settings -->
                        <div class="tab-pane fade show active" id="hero" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heroTitle" class="form-label">Hero Title</label>
                                        <input type="text" class="form-control" id="heroTitle" value="{{ $heroTitle ?? 'Professional Roofing Services' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="heroText" class="form-label">Hero Text</label>
                                        <textarea class="form-control" id="heroText" rows="3">{{ $heroText ?? 'Expert roofing solutions for residential and commercial properties' }}</textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="heroButtonText" class="form-label">Button Text</label>
                                        <input type="text" class="form-control" id="heroButtonText" value="Free Quote">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="heroBg" class="form-label">Hero Background Image</label>
                                        <div class="image-upload-container" id="heroImageUpload">
                                            <div class="upload-placeholder">
                                                <i class="ni ni-image"></i>
                                                <p>Click to upload or drag and drop</p>
                                                <p class="small text-muted">SVG, PNG, JPG (max. 5MB)</p>
                                            </div>
                                            <input type="file" class="d-none" accept="image/*">
                                        </div>
                                        <div class="mt-3">
                                            <p class="small">Current Image:</p>
                                            <div class="current-hero-image" style="height: 150px; background-size: cover; background-position: center; border-radius: 8px;"
                                                 style="background-image: url('{{ asset($heroBg ?? 'https://images.unsplash.com/photo-1542293787938-c9e299b880cc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80') }}')">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Preview</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="hero-preview" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset($heroBg ?? 'https://images.unsplash.com/photo-1542293787938-c9e299b880cc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80') }}'); background-size: cover; background-position: center; padding: 80px 20px; border-radius: 8px; text-align: center;">
                                                <h1 class="text-white" id="heroTitlePreview">{{ $heroTitle ?? 'Professional Roofing Services' }}</h1>
                                                <p class="text-white lead" id="heroTextPreview">{{ $heroText ?? 'Expert roofing solutions for residential and commercial properties' }}</p>
                                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill" id="heroButtonPreview">Free Quote</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- About Section Settings -->
<!-- About Section Settings -->
<div class="tab-pane fade" id="about" role="tabpanel">
    @php
        $homeAbout = \App\Models\HomeAbout::latest()->first();
    @endphp

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mt-2">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.general.about.update') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="aboutTitle" class="form-label">About Title</label>
                    <input type="text" class="form-control" name="title" id="aboutTitle"
                           value="{{ $homeAbout->title ?? 'About Our Company' }}">
                </div>
                <div class="form-group mt-3">
                    <label for="aboutDescription" class="form-label">About Description</label>
                    <textarea class="form-control" name="description" id="aboutDescription" rows="5">{{ $homeAbout->description ?? 'We are a team of dedicated professionals with over 15 years of experience in the roofing industry.' }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="feature1" class="form-label">Feature 1</label>
                    <input type="text" class="form-control" name="feature_1" id="feature1"
                           value="{{ $homeAbout->feature_1 ?? 'Quality Craftsmanship' }}">
                </div>
                <div class="form-group mt-3">
                    <label for="feature2" class="form-label">Feature 2</label>
                    <input type="text" class="form-control" name="feature_2" id="feature2"
                           value="{{ $homeAbout->feature_2 ?? 'Certified Professionals' }}">
                </div>
                <div class="form-group mt-3">
                    <label for="feature3" class="form-label">Feature 3</label>
                    <input type="text" class="form-control" name="feature_3" id="feature3"
                           value="{{ $homeAbout->feature_3 ?? '15+ Years Experience' }}">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4">Save About Section</button>
    </form>

    <!-- Preview -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6>Preview</h6>
                </div>
                <div class="card-body">
                    <div class="about-preview p-4" style="background: #f8f9fa; border-radius: 8px;">
                        <h3 id="aboutTitlePreview">{{ $homeAbout->title ?? 'About Our Company' }}</h3>
                        <div class="bg-primary my-3" style="height: 3px; width: 60px;"></div>
                        <p id="aboutDescriptionPreview">{{ $homeAbout->description ?? 'We are a team of dedicated professionals with over 15 years of experience in the roofing industry.' }}</p>
                        <div class="d-flex flex-wrap gap-3 mt-4">
                            <div class="bg-light p-3 rounded d-flex align-items-center" style="min-width: 200px;">
                                <i class="ni ni-check-bold text-primary me-2"></i>
                                <span id="feature1Preview">{{ $homeAbout->feature_1 ?? 'Quality Craftsmanship' }}</span>
                            </div>
                            <div class="bg-light p-3 rounded d-flex align-items-center" style="min-width: 200px;">
                                <i class="ni ni-check-bold text-primary me-2"></i>
                                <span id="feature2Preview">{{ $homeAbout->feature_2 ?? 'Certified Professionals' }}</span>
                            </div>
                            <div class="bg-light p-3 rounded d-flex align-items-center" style="min-width: 200px;">
                                <i class="ni ni-check-bold text-primary me-2"></i>
                                <span id="feature3Preview">{{ $homeAbout->feature_3 ?? '15+ Years Experience' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

                        
                        <!-- Discover Section Settings -->
                        <div class="tab-pane fade" id="discover" role="tabpanel">
                            @php
                                $homeDiscover = \App\Models\HomeDiscover::first();
                            @endphp
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discoverTitle" class="form-label">Discover Title</label>
                                        <input type="text" class="form-control" id="discoverTitle" value="{{ $homeDiscover->title ?? 'Discover Our Services' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="discoverDescription" class="form-label">Discover Description</label>
                                        <textarea class="form-control" id="discoverDescription" rows="4">{{ $homeDiscover->description ?? 'Explore our wide range of roofing services designed to meet your specific needs and requirements.' }}</textarea>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="discoverButtonText" class="form-label">Button Text</label>
                                        <input type="text" class="form-control" id="discoverButtonText" value="{{ $homeDiscover->button_text ?? 'Learn More' }}">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="discoverButtonLink" class="form-label">Button Link</label>
                                        <input type="text" class="form-control" id="discoverButtonLink" value="{{ $homeDiscover->button_link ?? '/services' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discoverBg" class="form-label">Discover Background Image</label>
                                        <div class="image-upload-container" id="discoverImageUpload">
                                            <div class="upload-placeholder">
                                                <i class="ni ni-image"></i>
                                                <p>Click to upload or drag and drop</p>
                                                <p class="small text-muted">SVG, PNG, JPG (max. 5MB)</p>
                                            </div>
                                            <input type="file" class="d-none" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h6>Preview</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="discover-preview p-5 text-center" style="background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1620595376565-5a61abf5726d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80'); background-size: cover; background-position: center; border-radius: 8px;">
                                                <h3 class="text-white" id="discoverTitlePreview">{{ $homeDiscover->title ?? 'Discover Our Services' }}</h3>
                                                <div class="bg-primary my-3 mx-auto" style="height: 3px; width: 60px;"></div>
                                                <p class="text-white" id="discoverDescriptionPreview">{{ $homeDiscover->description ?? 'Explore our wide range of roofing services designed to meet your specific needs and requirements.' }}</p>
                                                <a href="#" class="btn btn-primary px-4 py-2 rounded-pill mt-3" id="discoverButtonPreview">{{ $homeDiscover->button_text ?? 'Learn More' }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .image-upload-container {
        border: 2px dashed #dee2e6;
        border-radius: 8px;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .image-upload-container:hover {
        border-color: #3498db;
        background-color: rgba(52, 152, 219, 0.05);
    }
    
    .upload-placeholder i {
        font-size: 2rem;
        color: #6c757d;
        margin-bottom: 10px;
    }
    .nav-tabs .nav-link{
        background: #123150ff;
    }
    .nav-tabs .nav-link.active {
        color: #3498db;
        font-weight: 600;
        border-bottom: 3px solid #3498db;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .hero-preview, .discover-preview {
        transition: all 0.3s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Hero section live preview
        document.getElementById('heroTitle').addEventListener('input', function() {
            document.getElementById('heroTitlePreview').textContent = this.value;
        });
        
        document.getElementById('heroText').addEventListener('input', function() {
            document.getElementById('heroTextPreview').textContent = this.value;
        });
        
        document.getElementById('heroButtonText').addEventListener('input', function() {
            document.getElementById('heroButtonPreview').textContent = this.value;
        });
        
        // About section live preview
        document.getElementById('aboutTitle').addEventListener('input', function() {
            document.getElementById('aboutTitlePreview').textContent = this.value;
        });
        
        document.getElementById('aboutDescription').addEventListener('input', function() {
            document.getElementById('aboutDescriptionPreview').textContent = this.value;
        });
        
        document.getElementById('feature1').addEventListener('input', function() {
            document.getElementById('feature1Preview').textContent = this.value;
        });
        
        document.getElementById('feature2').addEventListener('input', function() {
            document.getElementById('feature2Preview').textContent = this.value;
        });
        
        document.getElementById('feature3').addEventListener('input', function() {
            document.getElementById('feature3Preview').textContent = this.value;
        });
        
        // Discover section live preview
        document.getElementById('discoverTitle').addEventListener('input', function() {
            document.getElementById('discoverTitlePreview').textContent = this.value;
        });
        
        document.getElementById('discoverDescription').addEventListener('input', function() {
            document.getElementById('discoverDescriptionPreview').textContent = this.value;
        });
        
        document.getElementById('discoverButtonText').addEventListener('input', function() {
            document.getElementById('discoverButtonPreview').textContent = this.value;
        });
        
        // Image upload functionality
        const heroUpload = document.querySelector('#heroImageUpload input[type="file"]');
        const discoverUpload = document.querySelector('#discoverImageUpload input[type="file"]');
        
        document.getElementById('heroImageUpload').addEventListener('click', function() {
            heroUpload.click();
        });
        
        document.getElementById('discoverImageUpload').addEventListener('click', function() {
            discoverUpload.click();
        });
        
        heroUpload.addEventListener('change', function(e) {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.current-hero-image').style.backgroundImage = `url(${e.target.result})`;
                    document.querySelector('.hero-preview').style.backgroundImage = `linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(${e.target.result})`;
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });
    });
</script>
@endsection