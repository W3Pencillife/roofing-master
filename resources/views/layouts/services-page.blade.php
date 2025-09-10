
@section('content')
<div class="container py-5">
    <h1 class="mb-4">{{ $post->title }}</h1>
    <div>
        {!! $post->content !!}
    </div>
</div>
@endsection
