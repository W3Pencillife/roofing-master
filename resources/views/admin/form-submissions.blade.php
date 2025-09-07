@extends('admin.admin-layout')

@section('content')
<div class="container-fluid">
    <!-- Top Section - Dynamic Quote Content -->
    <div class="row">
        <div class="col-12 form-content bg-primary text-white mb-4">
            <div class="content-inner p-4">
                <h2>{{ $quote?->title ?? 'Request a Quote' }}</h2>
                <p class="lead">{{ $quote?->subtitle ?? 'Fast and Easy' }}</p>
                <div class="benefits mt-4">
                    @if($quote?->benefit_1)
                        <div class="benefit-item mb-3">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ $quote->benefit_1 }}</span>
                        </div>
                    @endif
                    @if($quote?->benefit_2)
                        <div class="benefit-item mb-3">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ $quote->benefit_2 }}</span>
                        </div>
                    @endif
                    @if($quote?->benefit_3)
                        <div class="benefit-item mb-3">
                            <i class="bi bi-check-circle"></i>
                            <span>{{ $quote->benefit_3 }}</span>
                        </div>
                    @endif
                </div>

                <div class="mt-4">
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#editQuoteModal">
                        <i class="bi bi-pencil-square me-2"></i>Edit Content
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section - Form Submissions -->
    <div class="row">
        <div class="col-12">
            <div class="px-3">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Form Submissions</h1>
                </div>

                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="submissionsTable">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Subject</th>
                                        <th>Status</th>
                                        <th>Submitted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($submissions ?? [] as $submission)
                                        <tr>
                                            <td>{{ $submission->name }}</td>
                                            <td>{{ $submission->email }}</td>
                                            <td>{{ $submission->phone ?? '-' }}</td>
                                            <td>{{ $submission->subject ?? '-' }}</td>
                                            <td>
                                                @php
                                                    $badgeClasses = [
                                                        'new' => 'bg-warning text-dark',
                                                        'contacted' => 'bg-success',
                                                        'quoted' => 'bg-primary',
                                                        'closed' => 'bg-secondary'
                                                    ];
                                                @endphp
                                                <span class="badge {{ $badgeClasses[$submission->status] ?? 'bg-dark' }}">
                                                    {{ ucfirst($submission->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $submission->created_at->diffForHumans() }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-info view-btn" data-bs-toggle="modal" data-bs-target="#submissionModal"
                                                    data-id="{{ $submission->id }}"
                                                    data-name="{{ $submission->name }}"
                                                    data-email="{{ $submission->email }}"
                                                    data-phone="{{ $submission->phone }}"
                                                    data-subject="{{ $submission->subject }}"
                                                    data-message="{{ $submission->message }}"
                                                    data-status="{{ $submission->status }}"
                                                    data-date="{{ $submission->created_at->format('d M Y, h:i A') }}">
                                                    <i class="bi bi-eye"></i>
                                                </button>
                                                <form action="{{ route('admin.form-submissions.update') }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="delete_id" value="{{ $submission->id }}">
                                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
@empty
    <tr>
        <td colspan="7" class="text-center text-muted">No submissions found.</td>
    </tr>
@endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mt-3">
                            {{ $submissions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Quote Modal -->
<div class="modal fade" id="editQuoteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.form-submissions.update') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Edit Quote Content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="title" class="form-control mb-3" value="{{ $quote?->title }}" placeholder="Title">
                    <input type="text" name="subtitle" class="form-control mb-3" value="{{ $quote?->subtitle }}" placeholder="Subtitle">
                    <input type="text" name="benefit_1" class="form-control mb-3" value="{{ $quote?->benefit_1 }}" placeholder="Benefit 1">
                    <input type="text" name="benefit_2" class="form-control mb-3" value="{{ $quote?->benefit_2 }}" placeholder="Benefit 2">
                    <input type="text" name="benefit_3" class="form-control mb-3" value="{{ $quote?->benefit_3 }}" placeholder="Benefit 3">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Submission Modal -->
<div class="modal fade" id="submissionModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Submission Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>Name:</strong> <span id="detail-name"></span></p>
                        <p><strong>Email:</strong> <span id="detail-email"></span></p>
                        <p><strong>Phone:</strong> <span id="detail-phone"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Subject:</strong> <span id="detail-subject"></span></p>
                        <p><strong>Status:</strong> <span id="detail-status"></span></p>
                        <p><strong>Submitted:</strong> <span id="detail-date"></span></p>
                    </div>
                </div>
                <div class="mb-4">
                    <p id="detail-message"></p>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .form-content {
        background: linear-gradient(135deg, #3498db 0%, #2c3e50 100%);
        border-radius: 10px;
        margin: 0 15px;
    }
    
    .content-inner {
        max-width: 100%;
    }
    
    .form-content h2 {
        font-weight: 700;
        margin-bottom: 1rem;
        font-size: 2rem;
    }
    
    .form-content .lead {
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 1.5rem;
        font-size: 1.1rem;
    }
    
    .benefits {
        margin-top: 1.5rem;
    }
    
    .benefit-item {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        color: white;
        font-size: 1rem;
    }
    
    .benefit-item i {
        color: #2ecc71;
        margin-right: 10px;
        font-size: 1.2rem;
    }
    
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }
    
    .table th {
        border-top: none;
        font-weight: 600;
        color: #495057;
        background-color: #f8f9fa;
    }
    
    .badge {
        font-weight: 500;
        padding: 0.5em 0.8em;
    }
    
    .view-btn, .delete-btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    
    .pagination .page-item .page-link {
        border-radius: 5px;
        margin: 0 3px;
        color: #3498db;
    }
    
    .pagination .page-item.active .page-link {
        background-color: #3498db;
        border-color: #3498db;
    }
    
    @media (max-width: 768px) {
        .form-content {
            margin: 0 5px;
        }
        
        .form-content h2 {
            font-size: 1.75rem;
        }
        
        .d-flex {
            flex-direction: column;
            gap: 10px;
        }
        
        .dropdown, #exportBtn {
            width: 100%;
        }
        
        #filterDropdown {
            width: 100%;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const submissionModal = document.getElementById('submissionModal');
    submissionModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        document.getElementById('detail-name').textContent = button.getAttribute('data-name');
        document.getElementById('detail-email').textContent = button.getAttribute('data-email');
        document.getElementById('detail-phone').textContent = button.getAttribute('data-phone') || '-';
        document.getElementById('detail-subject').textContent = button.getAttribute('data-subject') || '-';
        document.getElementById('detail-message').textContent = button.getAttribute('data-message') || '-';
        document.getElementById('detail-status').innerHTML = `<span class="badge bg-info">${button.getAttribute('data-status')}</span>`;
        document.getElementById('detail-date').textContent = button.getAttribute('data-date');
    });
});
</script>
@endsection