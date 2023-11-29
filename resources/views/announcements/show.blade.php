@extends("layouts.main")

@section("content")
    <section class="container bg-white rounded-3 my-5 p-5">
        <div class="mb-3 pb-3 border-bottom">
            <h1>{{ $announcement->title }}</h1>
            <p class="text-secondary">Creat pe: {{ $announcement->created_at }}</p>
            <p class="text-secondary">Scris de: {{ $user->name }}</p>
        </div>

        <div>{!! $announcement->content !!}</div>
    </section>
@endsection
