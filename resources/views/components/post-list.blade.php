<ul class="list-group mb-5" style="list-style: none">
    @forelse($posts as $post)
        <li
            @class([
                "list-group-item d-flex justify-content-between align-items-center",
                "p-3" => $post->thumbnail === null,
                "ps-5 pe-5 pb-3" => $post->thumbnail !== null,
            ])
            @if ($post->thumbnail !== null)
                style="
                    background-image: url({{ $post->thumbnail }});
                    background-size: cover;
                    padding-top: 100px !important;
                "
            @endif
        >
            <a
                href="{{ route(Str::plural($name) . ".show", [$name => $post]) }}"
                class="text-black text-decoration-none rounded py-3 px-5 bg-white"
            >
                <h3>{{ $post->title }}</h3>
                <p class="description">{!! $post->getDescription() !!}</p>
            </a>
        </li>
    @empty
        <li class="text-center my-5">{{ $empty }}</li>
    @endforelse
</ul>
