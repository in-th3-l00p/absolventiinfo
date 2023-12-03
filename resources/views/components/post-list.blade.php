<ul class="list-group mb-5" style="list-style: none">
    @forelse($posts as $post)
        <li
            class="list-group-item d-flex justify-content-between align-items-center"
        >
            <a
                href="{{ route(Str::plural($name) . ".show", [$name => $post]) }}"
                class="post"
            >
                <h3>{{ $post->title }}</h3>
                <p class="description">{!! $post->getDescription() !!}</p>
            </a>
        </li>
    @empty
        <li class="text-center my-5">{{ $empty }}</li>
    @endforelse
</ul>
