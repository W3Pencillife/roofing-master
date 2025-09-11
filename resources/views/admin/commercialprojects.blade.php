@extends('admin.admin-layout')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6>Commercial Projects Management</h6>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCommercialModal">
                        <i class="fas fa-edit me-1"></i> Edit Content
                    </button>
                </div>

                <div class="card-body p-3">
                    <div class="row">
                        <!-- Image Preview -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><h6>Current Image</h6></div>
                                <div class="card-body text-center">
                                    <img src="{{ $project?->image ? asset($project->image) : 'https://via.placeholder.com/400x300' }}"
                                        id="previewCommercialImage" class="img-fluid rounded" alt="Commercial project preview">

                                    <div class="mt-3">
                                        <button class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#changeCommercialImageModal">
                                            <i class="fas fa-image me-1"></i> Change Image
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Preview -->
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header"><h6>Current Content Preview</h6></div>
                                <div class="card-body">
                                    <h4 class="text-primary" id="previewCommercialTitle">{{ $project?->title ?? 'Commercial Projects' }}</h4>
                                    <p class="text-dark" id="previewCommercialDescription">{{ $project?->description ?? 'We deliver high-performance roofing systems for commercial properties.' }}</p>

                                    <ul class="list-group list-group-flush" id="previewCommercialFeatures">
                                        @if(!empty($project?->features))
                                            @foreach($project->features as $feature)
                                                <li class="list-group-item border-0 px-0">
                                                    <span class="text-success me-2">✓</span>
                                                    <span>{{ $feature }}</span>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Content Preview -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editCommercialModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.projects.commercial.update') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Commercial Projects Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="{{ $project?->title }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description" rows="3">{{ $project?->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Features</label>
                        <div id="commercialFeaturesContainer">
                            @if(!empty($project?->features))
                                @foreach($project->features as $feature)
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" name="features[]" value="{{ $feature }}">
                                        <button class="btn btn-outline-danger remove-commercial-feature" type="button"><i class="fas fa-trash"></i></button>
                                    </div>
                                @endforeach
                            @else
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="features[]" placeholder="Enter feature">
                                    <button class="btn btn-outline-danger remove-commercial-feature" type="button"><i class="fas fa-trash"></i></button>
                                </div>
                            @endif
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary mt-2" id="addCommercialFeature"><i class="fas fa-plus me-1"></i> Add Feature</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Change Image Modal -->
<div class="modal fade" id="changeCommercialImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('admin.projects.commercial.updateImage') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Change Commercial Project Image</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Upload New Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*" id="commercialImageUpload">
                    </div>
                    <div class="border p-2 text-center">
                        <img src="{{ $project?->image ? asset($project->image) : 'https://via.placeholder.com/300x200' }}"
                            id="commercialImagePreview" class="img-fluid rounded">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Image</button>
                </div>
            </form>
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
    .remove-commercial-feature {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    #commercialImagePreview {
        max-height: 200px;
        object-fit: contain;
    }
</style>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const addBtn = document.getElementById('addCommercialFeature');
    const container = document.getElementById('commercialFeaturesContainer');

    // Add new feature
    addBtn.addEventListener('click', () => {
        const div = document.createElement('div');
        div.className = 'input-group mb-2';
        div.innerHTML = `
            <input type="text" class="form-control" name="features[]" placeholder="Enter feature">
            <button class="btn btn-outline-danger remove-commercial-feature" type="button"><i class="fas fa-trash"></i></button>
        `;
        container.appendChild(div);

        div.querySelector('.remove-commercial-feature').addEventListener('click', () => div.remove());
    });

    // Remove feature
    document.querySelectorAll('.remove-commercial-feature').forEach(btn => {
        btn.addEventListener('click', function () {
            this.closest('.input-group').remove();
        });
    });

    // Preview uploaded image
    // const imgUpload = document.getElementById('commercialImageUpload');
    // const imgPreview = document.getElementById('commercialImagePreview');
    // imgUpload.addEventListener('change', function (e) {
    //     const reader = new FileReader();
    //     reader.onload = (event) => imgPreview.src = event.target.result;
    //     reader.readAsDataURL(e.target.files[0]);
    // });

    const imgUpload = document.getElementById('commercialImageUpload');
    const imgPreview = document.getElementById('commercialImagePreview');

    imgUpload.addEventListener('change', function (e) {
        const reader = new FileReader();
        reader.onload = (event) => imgPreview.src = event.target.result;
        reader.readAsDataURL(e.target.files[0]);
    });

});
</script>

@endsection

