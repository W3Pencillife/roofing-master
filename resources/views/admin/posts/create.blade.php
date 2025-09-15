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
            <form>
                <div class="mb-3">
                    <label for="postTitle" class="form-label">Post Title</label>
                    <input type="text" class="form-control" id="postTitle" placeholder="Enter post title">
                </div>

                <div class="mb-3">
                    <label for="existingTitle" class="form-label">Or Select Existing Title</label>
                    <select class="form-select" id="existingTitle">
                        <option selected>Select an existing title</option>
                        <option value="1">Getting Started with Web Development</option>
                        <option value="2">Advanced Laravel Techniques</option>
                        <option value="3">Company News: Q3 Results</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="categoryTutorial" value="tutorial" checked>
                        <label class="form-check-label" for="categoryTutorial">
                            Tutorial
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="category" id="categoryNews" value="news">
                        <label class="form-check-label" for="categoryNews">
                            News
                        </label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="subtitle1" class="form-label">Subtitle 1</label>
                    <input type="text" class="form-control" id="subtitle1" placeholder="Enter subtitle 1">
                </div>

                <div class="mb-3">
                    <label for="subcontent1" class="form-label">Subcontent 1</label>
                    <textarea class="form-control" id="subcontent1" rows="3" placeholder="Enter subcontent 1"></textarea>
                </div>

                <div class="mb-3">
                    <label for="mainContent" class="form-label">Main Content</label>
                    <textarea class="form-control" id="mainContent" rows="5" placeholder="Enter main content"></textarea>
                </div>

                <div class="mb-3">
                    <label for="subtitle2" class="form-label">Subtitle 2</label>
                    <input type="text" class="form-control" id="subtitle2" placeholder="Enter subtitle 2">
                </div>

                <div class="mb-3">
                    <label for="subtitle3" class="form-label">Subtitle 3</label>
                    <input type="text" class="form-control" id="subtitle3" placeholder="Enter subtitle 3">
                </div>

                <div class="mb-3">
                    <label for="subcontent2" class="form-label">Subcontent 2</label>
                    <textarea class="form-control" id="subcontent2" rows="3" placeholder="Enter subcontent 2"></textarea>
                </div>

                <div class="mb-3">
                    <label for="postImage" class="form-label">Featured Image</label>
                    <input class="form-control" type="file" id="postImage">
                </div>

                <button type="submit" class="btn btn-primary">Publish Post</button>
                <button type="button" class="btn btn-secondary">Save Draft</button>
            </form>
        </div>
    </div>
</div>

<style>
    .breadcrumb {
        background-color: #f8f9fa;
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
    }
    .form-check {
        margin-bottom: 0.5rem;
    }
</style>
@endsection