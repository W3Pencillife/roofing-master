@extends('admin.admin-layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Footer Settings</h6>
                    <button type="submit" form="footerSettingsForm" class="btn btn-primary btn-sm">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
                <div class="card-body p-3">
                    <form id="footerSettingsForm" action="{{ route('admin.site-settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @method('POST')
                        <div class="row">

                            <!-- Left Column -->
                            <div class="col-md-6">

                                <!-- Brand Information -->
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h6>Brand Information</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="footerLogo" class="form-label">Logo</label>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $setting->logo ? asset('images/' . $setting->logo) : asset('images/logo-placeholder.png') }}" 
                                                     id="logoPreview" class="img-fluid me-3" style="max-height: 50px;" alt="Logo preview">
                                                <div>
                                                    <input class="form-control" type="file" name="logo" id="footerLogo" accept="image/*">
                                                    <div class="form-text">Recommended size: 150x50 pixels</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tagline" class="form-label">Tagline</label>
                                            <textarea class="form-control" name="footer_tagline" id="tagline" rows="2">{{ old('footer_tagline', $setting->footer_tagline) }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Media Links -->
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Social Media Links</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input type="url" name="facebook" class="form-control" value="{{ old('facebook', $setting->facebook) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input type="url" name="twitter" class="form-control" value="{{ old('twitter', $setting->twitter) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Instagram</label>
                                            <input type="url" name="instagram" class="form-control" value="{{ old('instagram', $setting->instagram) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">YouTube</label>
                                            <input type="url" name="youtube" class="form-control" value="{{ old('youtube', $setting->youtube) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">LinkedIn</label>
                                            <input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $setting->linkedin) }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">

                                <!-- Copyright Text -->
                                <div class="card">
                                    <div class="card-header">
                                        <h6>Copyright Text</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <input type="text" name="copyright_text" class="form-control" 
                                                value="{{ old('copyright_text', $setting->copyright_text) }}">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e9ecef;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .remove-service, .remove-support {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .input-group {
        flex-wrap: nowrap;
    }
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Add service link
    document.getElementById('addServiceLink').addEventListener('click', function() {
        const newService = document.createElement('div');
        newService.className = 'input-group mb-2';
        newService.innerHTML = `
            <input type="text" class="form-control" placeholder="Enter service name">
            <button class="btn btn-outline-danger remove-service" type="button"><i class="fas fa-trash"></i></button>
        `;
        document.getElementById('servicesContainer').appendChild(newService);
        newService.querySelector('.remove-service').addEventListener('click', function() {
            newService.remove();
        });
    });

    // Remove service link
    document.querySelectorAll('.remove-service').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.input-group').remove();
        });
    });

    // Add support link
    document.getElementById('addSupportLink').addEventListener('click', function() {
        const newSupport = document.createElement('div');
        newSupport.className = 'input-group mb-2';
        newSupport.innerHTML = `
            <input type="text" class="form-control" placeholder="Enter support link text">
            <button class="btn btn-outline-danger remove-support" type="button"><i class="fas fa-trash"></i></button>
        `;
        document.getElementById('supportContainer').appendChild(newSupport);
        newSupport.querySelector('.remove-support').addEventListener('click', function() {
            newSupport.remove();
        });
    });

    // Remove support link
    document.querySelectorAll('.remove-support').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.input-group').remove();
        });
    });

    // Logo preview
    document.getElementById('footerLogo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('logoPreview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });


    // Save footer settings
    document.getElementById('saveFooterSettings').addEventListener('click', function() {
        const services = [];
        document.querySelectorAll('#servicesContainer input').forEach(input => {
            if(input.value.trim() !== '') services.push(input.value);
        });

        const supportLinks = [];
        document.querySelectorAll('#supportContainer input').forEach(input => {
            if(input.value.trim() !== '') supportLinks.push(input.value);
        });

        alert('Footer settings saved successfully!');

        // Example: Submit form data to server here
    });

});
</script>
@endsection
