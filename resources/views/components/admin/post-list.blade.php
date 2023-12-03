<div class="container shadow my-5 p-5 bg-white rounded-3 w-100">
    <div class="container d-flex justify-content-between align-items-center mb-5">
        <h1>{{ $title }}</h1>
        <a href="{{ route(Str::plural($name) . ".create") }}">
            <button class="btn btn-secondary">
                +
            </button>
        </a>
    </div>

    <ul class="list-group mb-5" style="list-style: none">
        @forelse($posts as $post)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <h2>{{ $post->title }}</h2>
                <a href="{{ route(Str::plural($name) . ".edit", [$name => $post]) }}">
                    <button type="button" class="btn btn-dark">
                        Edit
                    </button>
                </a>
            </li>
        @empty
            <li class="text-center my-5">{{ $empty }}</li>
        @endforelse
    </ul>
    {{ $posts->links() }}
</div>
