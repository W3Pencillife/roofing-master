@extends('admin.admin-layout')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add New Post</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">All Posts</a></li>
        <li class="breadcrumb-item active">Add New</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-plus me-1"></i>
            Create New Post
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Post Title -->
                <div class="mb-3">
                    <label for="postTitle" class="form-label">Post Title</label>
                    <input type="text" class="form-control" name="title" id="postTitle" required>
                </div>

                <!-- Category -->
                <div class="mb-3">
                    <label class="form-label">Category</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" value="Residential Services" checked>
                        <label class="form-check-label">Residential Services</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="category" value="Commercial Services">
                        <label class="form-check-label">Commercial Services</label>
                    </div>
                </div>

                <!-- Dynamic subtitles & subcontents -->
                @php
                    $sections = ['subtitle1','subcontent1','subtitle2','subtitle3','subcontent2'];
                @endphp

                @foreach($sections as $section)
                    <div class="mb-3">
                        <label class="form-label">{{ ucwords(str_replace(['subtitle','subcontent'], ['Subtitle ','Subcontent '], $section)) }}</label>
                        @if(str_contains($section, 'subcontent'))
                            <textarea class="form-control" name="{{ $section }}" rows="3"></textarea>
                        @else
                            <input type="text" class="form-control" name="{{ $section }}">
                        @endif
                    </div>
                @endforeach

                <!-- Main Content -->
                <div class="mb-3">
                    <label for="mainContent" class="form-label">Main Content</label>
                    <textarea class="form-control" name="content" id="mainContent" rows="5" required></textarea>
                </div>

                <!-- Featured Image -->
                <div class="mb-3">
                    <label for="postImage" class="form-label">Featured Image</label>
                    <input class="form-control" type="file" name="image" id="postImage">
                </div>

                <button type="submit" class="btn btn-primary">Publish Post</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </form>
        </div>
    </div>
</div>
@endsection
