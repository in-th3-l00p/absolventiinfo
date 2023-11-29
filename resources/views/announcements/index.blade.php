@extends("layouts.main")

@push("styles")
    @vite(["resources/sass/posts.scss"])
@endpush

@section("content")
    <div class="container bg-white rounded-3 my-5 p-5">
        <h1 class="mb-5">Anunturi</h1>

        <ul class="list-group mb-5" style="list-style: none">
            @forelse($announcements as $announcement)
                <li
                    class="list-group-item d-flex justify-content-between align-items-center"
                >
                    <a
                        href="{{ route("announcements.show", ["announcement" => $announcement]) }}"
                        class="post"
                    >
                        <h3>{{ $announcement->title }}</h3>
                        <p class="description">{!! $announcement->getDescription() !!}</p>
                    </a>
                </li>
            @empty
                <li class="text-center my-5">Nu exista niciun anunt</li>
            @endforelse
        </ul>
        {{ $announcements->links() }}
    </div>
@endsection
