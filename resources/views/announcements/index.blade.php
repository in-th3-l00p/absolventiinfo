@extends("layouts.main")

@section("content")
    <div class="container bg-white rounded-3 my-5 p-5">
        <h1>Anunturi</h1>

        <ul class="list-group mb-5" style="list-style: none">
            @forelse($announcements as $announcement)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a
                        href="{{ route("announcements.show", ["announcement" => $announcement]) }}"
                        class="text-black"
                    >
                        <h2>{{ $announcement->title }}</h2>
                    </a>
                </li>
            @empty
                <li class="text-center my-5">Nu exista niciun anunt</li>
            @endforelse
        </ul>
        {{ $announcements->links() }}
    </div>
@endsection
