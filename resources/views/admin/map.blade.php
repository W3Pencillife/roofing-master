@extends('admin.admin-layout')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0 text-gray-800">Map Location Management</h1>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#helpModal">
                    <i class="bi bi-question-circle me-2"></i>Help Guide
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Location Map Preview</h6>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i> This is how your location map will appear on the website.
                    </div>
                    
                    <div class="map-preview-container border rounded p-3 bg-light">
                        <div class="map-responsive">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.901267210195!2d90.41402031544198!3d23.810331384587267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b02c7f678f%3A0xa1b2c7d32b06f8b0!2sDhaka!5e0!3m2!1sen!2sbd!4v1694600000000!5m2!1sen!2sbd"
                                width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                                id="mapPreview"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Update Map Settings</h6>
                </div>
                <div class="card-body">
                    <form id="mapSettingsForm">
                        @csrf
                        
                        <div class="mb-4">
                            <h5 class="mb-3">Map Configuration</h5>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Google Maps Embed URL</label>
                                <input type="text" class="form-control" name="map_url" 
                                    value="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.901267210195!2d90.41402031544198!3d23.810331384587267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b02c7f678f%3A0xa1b2c7d32b06f8b0!2sDhaka!5e0!3m2!1sen!2sbd!4v1694600000000!5m2!1sen!2sbd"
                                    placeholder="Paste Google Maps embed URL">
                                <div class="form-text">Get this from Google Maps → Share → Embed a map</div>
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Map Height (pixels)</label>
                                <input type="number" class="form-control" name="map_height" value="400" min="200" max="800">
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <h5 class="mb-3">Location Information</h5>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Location Name</label>
                                <input type="text" class="form-control" name="location_name" value="Main Office">
                            </div>
                            
                            <div class="form-group mb-3">
                                <label class="form-label">Address</label>
                                <textarea class="form-control" name="address" rows="2">123 Roofing Street, Cityville, ST 12345</textarea>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="(123) 456-7890">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Email Address</label>
                                        <input type="email" class="form-control" name="email" value="info@roofingcompany.com">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Update Map Settings
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="testMapBtn">
                                <i class="bi bi-eye me-2"></i>Test Map Preview
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Help Modal -->
<div class="modal fade" id="helpModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Map Configuration Guide</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h6>How to get your Google Maps embed URL:</h6>
                <ol>
                    <li>Go to Google Maps and find your location</li>
                    <li>Click on the "Share" button</li>
                    <li>Select the "Embed a map" tab</li>
                    <li>Copy the provided iframe code</li>
                    <li>Extract the URL from the src attribute of the iframe</li>
                </ol>
                
                <div class="alert alert-info">
                    <i class="bi bi-lightbulb me-2"></i> Example URL format: 
                    <code>https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d... </code>
                </div>
                
                <h6>Customization Options:</h6>
                <ul>
                    <li><strong>Map Height:</strong> Adjust the height of the map display (200-800 pixels)</li>
                    <li><strong>Location Details:</strong> Update your business contact information</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }
    
    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }
    
    .map-preview-container {
        position: relative;
    }
    
    .form-label {
        font-weight: 600;
        color: #495057;
        margin-bottom: 0.5rem;
    }
    
    .map-responsive {
        overflow: hidden;
        padding-bottom: 56.25%; /* 16:9 aspect ratio */
        position: relative;
        height: 0;
        border-radius: 8px;
    }

    .map-responsive iframe {
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        position: absolute;
        border-radius: 8px;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Test map preview button
    document.getElementById('testMapBtn').addEventListener('click', function() {
        const mapUrl = document.querySelector('input[name="map_url"]').value;
        const mapHeight = document.querySelector('input[name="map_height"]').value;
        
        if (mapUrl) {
            const mapPreview = document.getElementById('mapPreview');
            mapPreview.src = mapUrl;
            mapPreview.height = mapHeight;
        } else {
            alert('Please enter a valid Google Maps URL');
        }
    });
    
    // Form submission
    document.getElementById('mapSettingsForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Get form data
        const formData = new FormData(this);
        
        // Simulate AJAX request (replace with actual form submission)
        setTimeout(() => {
            // Update preview with new settings
            const mapUrl = formData.get('map_url');
            const mapHeight = formData.get('map_height');
            
            if (mapUrl) {
                const mapPreview = document.getElementById('mapPreview');
                mapPreview.src = mapUrl;
                mapPreview.height = mapHeight;
            }
            
            // Show success message
            alert('Map settings updated successfully!');
        }, 500);
    });
});
</script>
@endsection