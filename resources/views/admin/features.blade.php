@extends('admin.admin-layout')

@section('content')

<div class="container-fluid">

<!-- Section Header Management -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Section Header Management</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.features.header.update') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="sectionTitle">Section Title</label>
                            <input type="text" class="form-control" id="sectionTitle" name="sectionTitle" value="">
                        </div>
                        <div class="form-group">
                            <label for="highlightText">Highlighted Text</label>
                            <input type="text" class="form-control" id="highlightText" name="highlightText" value="">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Header</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Features Management</h1>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeatureModal">
            <i class="fas fa-plus me-2"></i>Add New Feature
        </button>
    </div>

    <!-- Features Table -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span>All Features</span>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
<tbody>
    @forelse($features as $index => $feature)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td><i class="bi {{ $feature->icon }} feature-icon-display"></i></td>
            <td>{{ $feature->heading }}</td>
            <td>{{ $feature->description }}</td>
            <td>
                <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger action-btn">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No features added yet.</td>
        </tr>
    @endforelse
</tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Feature Modal -->
<div class="modal fade" id="addFeatureModal" tabindex="-1" aria-labelledby="addFeatureModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFeatureModalLabel">Add New Feature</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
<form action="{{ route('admin.features.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="featureTitle" class="form-label">Feature Title</label>
                <input type="text" class="form-control" name="featureTitle" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="featureIcon" class="form-label">Icon</label>
                <select class="form-select" name="featureIcon" required>
                    <option value="bi-award">Award (bi-award)</option>
                    <option value="bi-cash-stack">Cash Stack (bi-cash-stack)</option>
                    <option value="bi-graph-up">Graph Up (bi-graph-up)</option>
                    <option value="bi-shield-check">Shield Check (bi-shield-check)</option>
                    <option value="bi-chat-dots">Chat Dots (bi-chat-dots)</option>
                    <option value="bi-building-gear">Building Gear (bi-building-gear)</option>
                    <option value="bi-tools">Tools (bi-tools)</option>
                    <option value="bi-clock-history">Clock History (bi-clock-history)</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mb-3">
        <label for="featureDescription" class="form-label">Description</label>
        <textarea class="form-control" name="featureDescription" rows="3" required></textarea>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Feature</button>
    </div>
</form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Feature</button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
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
    
    .feature-icon-display {
        font-size: 1.5rem;
        color: var(--primary);
    }
    
    /* Preview Styles */
    .why-choose-us-preview {
        padding: 20px 0;
    }
    
    .section-title-preview {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    
    .highlight-preview {
        color: var(--primary);
    }
    
    .divider-preview {
        height: 3px;
        width: 60px;
        background-color: var(--primary);
        margin-bottom: 2rem;
    }
    
    .benefit-card-preview {
        padding: 20px;
        transition: transform 0.3s;
    }
    
    .benefit-card-preview:hover {
        transform: translateY(-5px);
    }
    
    .benefit-icon-preview i {
        font-size: 2.5rem;
        color: var(--primary);
    }
    
    .benefit-card-preview h3 {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        color: var(--dark);
    }
    
    .benefit-card-preview p {
        color: #6c757d;
        line-height: 1.6;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
        
        // Preview icon change
        document.getElementById('featureIcon').addEventListener('change', function(e) {
            var iconValue = e.target.value;
            console.log('Selected icon:', iconValue);
            // In a real application, you would update a preview element here
        });
    });
</script>

@endsection

