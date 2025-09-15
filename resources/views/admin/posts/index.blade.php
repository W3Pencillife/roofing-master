@extends('admin.admin-layout')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mt-4">All Posts</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Add New Post
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Published Posts
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Getting Started with Web Development</td>
                        <td>Tutorial</td>
                        <td>2023-10-15</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Advanced Laravel Techniques</td>
                        <td>Tutorial</td>
                        <td>Admin User</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Company News: Q3 Results</td>
                        <td>News</td>
                        <td>Admin User</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid #e3e6f0;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
</style>
@endsection