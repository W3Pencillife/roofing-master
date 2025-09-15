@extends('admin.admin-layout')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Post Categories</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>

    <div class="row">
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    Tutorial Posts
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Getting Started with Web Development
                            <span class="badge bg-primary rounded-pill">14 views</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Advanced Laravel Techniques
                            <span class="badge bg-primary rounded-pill">22 views</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            CSS Grid Layout Tutorial
                            <span class="badge bg-primary rounded-pill">7 views</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            JavaScript Best Practices
                            <span class="badge bg-primary rounded-pill">19 views</span>
                        </a>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-1"></i>
                    News Posts
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Company News: Q3 Results
                            <span class="badge bg-primary rounded-pill">31 views</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            New Office Opening
                            <span class="badge bg-primary rounded-pill">24 views</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Product Launch Announcement
                            <span class="badge bg-primary rounded-pill">42 views</span>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            Industry Conference Highlights
                            <span class="badge bg-primary rounded-pill">13 views</span>
                        </a>
                    </div>
                </div>
                <div class="card-footer small text-muted">
                    Updated yesterday at 11:59 PM
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            All Posts by Category
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs mb-3" id="categoryTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="tutorial-tab" data-bs-toggle="tab" data-bs-target="#tutorial" type="button" role="tab" aria-controls="tutorial" aria-selected="true">Tutorial</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button" role="tab" aria-controls="news" aria-selected="false">News</button>
                </li>
            </ul>
            <div class="tab-content" id="categoryTabContent">
                <div class="tab-pane fade show active" id="tutorial" role="tabpanel" aria-labelledby="tutorial-tab">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Getting Started with Web Development</td>
                                <td>Admin User</td>
                                <td>2023-10-15</td>
                                <td>14</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Advanced Laravel Techniques</td>
                                <td>Admin User</td>
                                <td>2023-10-10</td>
                                <td>22</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Date</th>
                                <th>Views</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3</td>
                                <td>Company News: Q3 Results</td>
                                <td>Admin User</td>
                                <td>2023-10-05</td>
                                <td>31</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .list-group-item:hover {
        background-color: #f8f9fa;
    }
    .nav-tabs .nav-link.active {
        font-weight: 600;
        border-bottom: 3px solid #0d6efd;
    }
</style>
@endsection