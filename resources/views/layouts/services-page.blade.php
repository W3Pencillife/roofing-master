

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Posts for {{ $category }}</h1>

    @if($posts->isEmpty())
        <p>No posts found in this category.</p>
    @else
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <a href="/" class="btn btn-primary mt-3">Go Back</a>
</div>
@endsection
