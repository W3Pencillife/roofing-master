@extends('admin.admin-layout')

@section('content')
<div class="container-fluid">

<!-- Section Settings Modal -->
<div class="modal fade" id="sectionSettingsModal" tabindex="-1" aria-labelledby="sectionSettingsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sectionSettingsModalLabel">Partners Section Settings</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="sectionTitle" class="form-label">Section Title</label>
                        <input type="text" class="form-control" id="sectionTitle" value="Our Partners">
                    </div>
                    <div class="mb-3">
                        <label for="highlightText" class="form-label">Highlighted Text</label>
                        <input type="text" class="form-control" id="highlightText" value="Partners">
                    </div>
                    <div class="mb-3">
                        <label for="sectionDescription" class="form-label">Section Description</label>
                        <textarea class="form-control" id="sectionDescription" rows="3">Adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</textarea>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="sectionVisibility" checked>
                            <label class="form-check-label" for="sectionVisibility">Show Section on Website</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save Changes</button>
            </div>
        </div>
    </div>
</div>
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Partners Management</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPartnerModal">
            <i class="fas fa-plus me-2"></i>Add New Partner
        </button>
    </div>


    <!-- Partners Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>All Partners</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Website</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
<tbody>
@foreach($partners as $index => $partner)
<tr>
    <td>{{ $index + 1 }}</td>
    <td>
        <img src="{{ asset('uploads/partners/'.$partner->image) }}" class="partner-logo" alt="{{ $partner->name }}">
    </td>
    <td>{{ $partner->name }}</td>
    <td>{{ $partner->link ?? 'N/A' }}</td>
    <td>
        <!-- Edit functionality can be added later -->
        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-outline-danger action-btn">
                <i class="fas fa-trash"></i>
            </button>
        </form>
    </td>
</tr>
@endforeach
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Partner Modal -->
<div class="modal fade" id="addPartnerModal" tabindex="-1" aria-labelledby="addPartnerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPartnerModalLabel">Add New Partner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="partnerName" class="form-label">Partner Name</label>
        <input type="text" class="form-control" name="name" id="partnerName" required>
    </div>
    <div class="mb-3">
        <label for="websiteUrl" class="form-label">Website URL</label>
        <input type="url" class="form-control" name="link" id="websiteUrl">
    </div>
    <div class="mb-3">
        <label for="logoUpload" class="form-label">Partner Logo</label>
        <input type="file" class="form-control" name="image" id="logoUpload" accept="image/*" required>
        <div class="form-text">Recommended size: 200x100 pixels. Max file size: 2MB</div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Partner</button>
    </div>
</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Partner</button>
            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --primary: #3498db;
        --secondary: #2c3e50;
        --light: #f8f9fa;
        --dark: #343a40;
        --success: #28a745;
        --danger: #dc3545;
    }
    
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        margin-bottom: 20px;
    }
    
    .card-header {
        background-color: white;
        border-bottom: 1px solid #eee;
        font-weight: 600;
        padding: 15px 20px;
    }
    
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
    }
    
    .status-badge {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
    }
    
    .partner-logo {
        width: 80px;
        height: 50px;
        object-fit: contain;
        background: white;
        padding: 5px;
        border-radius: 4px;
        border: 1px solid #dee2e6;
    }
    
    .action-btn {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
    }
    
    .stats-card {
        text-align: center;
        padding: 20px;
    }
    
    .stats-number {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
    }
    
    .stats-label {
        color: #6c757d;
        font-weight: 500;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // File input label update
        document.getElementById('logoUpload').addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerText = fileName;
        });
    });
</script>
@endsection