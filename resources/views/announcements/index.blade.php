@extends("layouts.main")

@push("styles")
    @vite(["resources/sass/posts.scss"])
@endpush

@section("content")
    <div class="container bg-white rounded-3 my-5 p-5 shadow">
        <h1 class="mb-5">Anunturi</h1>

        <x-post-list
            :posts="$announcements"
            name="announcement"
            empty="Nu a fost publicat niciun anunt"
        />
        {{ $announcements->links() }}
    </div>
@endsection
