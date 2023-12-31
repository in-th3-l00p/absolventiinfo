@extends("layouts.main")

@push("styles")
    @vite(["resources/sass/post.scss"])
    <link rel="stylesheet" href="/ckeditor/content-styles.css">
@endpush

@section("content")
    <section class="w-100 container shadow bg-white rounded-3 my-5 p-5 shadow">
        <div class="mb-3 pb-3 border-bottom">
            <h1>{{ $announcement->title }}</h1>
            <p class="text-secondary">Creat pe data de: {{ \Carbon\Carbon::make($announcement->created_at)->toDateString() }}</p>
            <p class="text-secondary">Scris de: {{ $user->first_name . " " . $user->last_name }}</p>
        </div>

        <div class="ck-content content">{!! $announcement->content !!}</div>
    </section>
@endsection
