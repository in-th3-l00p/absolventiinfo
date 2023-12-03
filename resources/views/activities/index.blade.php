@extends("layouts.main")

@push("styles")
    @vite(["resources/sass/posts.scss"])
@endpush

@section("content")
    <div class="container bg-white rounded-3 my-5 p-5 shadow">
        <h1 class="mb-5">Activitati</h1>

        <x-post-list
            :posts="$activities"
            name="activity"
            empty="Nu a fost publicat nicio activitate"
        />
        {{ $activities->links() }}
    </div>
@endsection
