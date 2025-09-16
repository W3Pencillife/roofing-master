@extends('admin.admin-layout')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">View Post</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">All Posts</a></li>
        <li class="breadcrumb-item active">View Post</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-eye me-1"></i>
            Post Details
        </div>
        <div class="card-body">
            <!-- Post Title -->
            <div class="mb-3">
                <h3>{{ $post->title }}</h3>
            </div>

            <!-- Category -->
            <div class="mb-3">
                <strong>Category:</strong> {{ $post->category }}
            </div>

            <!-- Featured Image -->
            @if($post->image)
                <div class="mb-3">
                    <strong>Featured Image:</strong><br>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid" style="max-height: 300px;">
                </div>
            @endif

            <!-- Main Content -->
            <div class="mb-3">
                <strong>Main Content:</strong>
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>

            <!-- Subtitles & Subcontents -->
            @php
                $sections = [
                    'subtitle1' => 'Subtitle 1',
                    'subcontent1' => 'Subcontent 1',
                    'subtitle2' => 'Subtitle 2',
                    'subtitle3' => 'Subtitle 3',
                    'subcontent2' => 'Subcontent 2'
                ];
            @endphp

            @foreach($sections as $field => $label)
                @if(!empty($post->$field))
                    <div class="mb-3">
                        <strong>{{ $label }}:</strong>
                        @if(str_contains($field, 'subcontent'))
                            <p>{!! nl2br(e($post->$field)) !!}</p>
                        @else
                            <p>{{ $post->$field }}</p>
                        @endif
                    </div>
                @endif
            @endforeach

            <!-- Back Button -->
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary mt-3"><i class="fas fa-arrow-left me-1"></i> Back to Posts</a>
        </div>
    </div>
</div>
@endsection
