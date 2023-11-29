@extends("layouts.main")

@section("content")
    <section class="flex-grow-1 d-flex h-100">
        <x-admin-sidebar />
        <div class="container my-5 p-5 bg-white rounded-3 w-100">
            <div class="container d-flex justify-content-between align-items-center mb-5">
                <h1>Anunturi</h1>
                <a href="{{ route("announcements.create") }}">
                    <button class="btn btn-secondary">
                        +
                    </button>
                </a>
            </div>

            <ul class="list-group mb-5" style="list-style: none">
                @forelse($announcements as $announcement)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <h2>{{ $announcement->title }}</h2>
                        <a href="{{ route("announcements.edit", ["announcement" => $announcement]) }}">
                            <button type="button" class="btn btn-dark">
                                Edit
                            </button>
                        </a>
                    </li>
                @empty
                    <li class="text-center my-5">Nu exista niciun anunt</li>
                @endforelse
            </ul>
            {{ $announcements->links() }}
        </div>
    </section>
@endsection
