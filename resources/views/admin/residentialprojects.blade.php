@extends('admin.admin-layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <!-- Main Card -->
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Residential Projects Management</h6>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editContentModal">
                        <i class="fas fa-edit me-1"></i> Edit Content
                    </button>
                </div>

                <div class="card-body p-3">
                    <div class="row">
                        <!-- Content Preview -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h6>Current Content Preview</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="text-primary" id="previewTitle">Residential Projects</h4>
                                    <p class="text-dark" id="previewDescription">
                                        We specialize in transforming homes with premium roofing solutions 
                                        that combine durability, aesthetics, and weather protection.
                                    </p>

                                    <ul class="list-group list-group-flush" id="previewFeatures">
                                        <li class="list-group-item border-0 px-0">
                                            <span class="text-success me-2">✓</span>
                                            <span>Custom-designed roofing solutions</span>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <span class="text-success me-2">✓</span>
                                            <span>High-quality materials with 25-year warranty</span>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <span class="text-success me-2">✓</span>
                                            <span>Energy-efficient options available</span>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <span class="text-success me-2">✓</span>
                                            <span>Storm-resistant installations</span>
                                        </li>
                                        <li class="list-group-item border-0 px-0">
                                            <span class="text-success me-2">✓</span>
                                            <span>5-star rated craftsmanship</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Image Preview -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Current Image</h6>
                                </div>
                                <div class="card-body text-center">
                                    <img src="https://via.placeholder.com/400x300" id="previewImage" 
                                         class="img-fluid rounded" alt="Residential project preview">
                                    <div class="mt-3">
                                        <button class="btn btn-outline-primary btn-sm" 
                                                data-bs-toggle="modal" data-bs-target="#changeImageModal">
                                            <i class="fas fa-image me-1"></i> Change Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Image Preview -->
                    </div>
                </div>
            </div>
            <!-- End Main Card -->
        </div>
    </div>
</div>

<!-- Edit Content Modal -->
<div class="modal fade" id="editContentModal" tabindex="-1" aria-labelledby="editContentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Residential Projects Content</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="contentForm">
                    <!-- Title -->
                    <div class="mb-3">
                        <label for="titleInput" class="form-label">Title</label>
                        <input type="text" class="form-control" id="titleInput" value="Residential Projects">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="descriptionInput" class="form-label">Description</label>
                        <textarea class="form-control" id="descriptionInput" rows="3">
We specialize in transforming homes with premium roofing solutions that combine durability, aesthetics, and weather protection.
                        </textarea>
                    </div>

                    <!-- Features -->
                    <div class="mb-3">
                        <label class="form-label">Features</label>
                        <div id="featuresContainer">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="Custom-designed roofing solutions">
                                <button class="btn btn-outline-danger remove-feature" type="button">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="High-quality materials with 25-year warranty">
                                <button class="btn btn-outline-danger remove-feature" type="button">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="Energy-efficient options available">
                                <button class="btn btn-outline-danger remove-feature" type="button">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="Storm-resistant installations">
                                <button class="btn btn-outline-danger remove-feature" type="button">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" value="5-star rated craftsmanship">
                                <button class="btn btn-outline-danger remove-feature" type="button">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addFeature">
                            <i class="fas fa-plus me-1"></i> Add Feature
                        </button>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveContent">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<!-- Change Image Modal -->
<div class="modal fade" id="changeImageModal" tabindex="-1" aria-labelledby="changeImageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Project Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- File Upload -->
                <div class="mb-3">
                    <label for="imageUpload" class="form-label">Upload New Image</label>
                    <input class="form-control" type="file" id="imageUpload" accept="image/*">
                </div>

                <!-- Image URL -->
                <div class="mb-3">
                    <label for="imageUrl" class="form-label">Or Enter Image URL</label>
                    <input type="url" class="form-control" id="imageUrl" placeholder="https://example.com/image.jpg">
                </div>

                <!-- Preview -->
                <div class="border p-2 text-center">
                    <img src="https://via.placeholder.com/300x200" id="imagePreview" 
                         class="img-fluid rounded" alt="Image preview">
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="saveImage">Save Image</button>
            </div>
        </div>
    </div>
</div>

<!-- Styles -->
<style>
    .card-header {
        background-color: #fff;
        border-bottom: 1px solid #e9ecef;
    }
    .list-group-item {
        padding: 0.5rem 0;
    }
    .remove-feature {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    #imagePreview {
        max-height: 200px;
        object-fit: contain;
    }
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add feature
    document.getElementById('addFeature').addEventListener('click', function() {
        const newFeature = document.createElement('div');
        newFeature.className = 'input-group mb-2';
        newFeature.innerHTML = `
            <input type="text" class="form-control" placeholder="Enter feature">
            <button class="btn btn-outline-danger remove-feature" type="button">
                <i class="fas fa-trash"></i>
            </button>
        `;
        document.getElementById('featuresContainer').appendChild(newFeature);

        // Bind remove button
        newFeature.querySelector('.remove-feature').addEventListener('click', function() {
            newFeature.remove();
        });
    });

    // Remove feature
    document.querySelectorAll('.remove-feature').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.input-group').remove();
        });
    });

    // Save content
    document.getElementById('saveContent').addEventListener('click', function() {
        // Title
        document.getElementById('previewTitle').textContent = document.getElementById('titleInput').value;

        // Description
        document.getElementById('previewDescription').textContent = document.getElementById('descriptionInput').value;

        // Features
        const featuresContainer = document.getElementById('previewFeatures');
        featuresContainer.innerHTML = '';
        document.querySelectorAll('#featuresContainer input').forEach(input => {
            if (input.value.trim() !== '') {
                const li = document.createElement('li');
                li.className = 'list-group-item border-0 px-0';
                li.innerHTML = `<span class="text-success me-2">✓</span><span>${input.value}</span>`;
                featuresContainer.appendChild(li);
            }
        });

        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('editContentModal'));
        modal.hide();

        alert('Content updated successfully!');
    });

    // Image upload preview
    document.getElementById('imageUpload').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('imagePreview').src = event.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Image URL preview
    document.getElementById('imageUrl').addEventListener('input', function() {
        if (this.value) {
            document.getElementById('imagePreview').src = this.value;
        }
    });

    // Save image
    document.getElementById('saveImage').addEventListener('click', function() {
        const newImageUrl = document.getElementById('imagePreview').src;
        document.getElementById('previewImage').src = newImageUrl;

        // Close modal
        const modal = bootstrap.Modal.getInstance(document.getElementById('changeImageModal'));
        modal.hide();

        alert('Image updated successfully!');
    });
});
</script>
@endsection
