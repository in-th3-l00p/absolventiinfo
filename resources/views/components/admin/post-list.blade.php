@push("scripts")
    @vite([ "resources/js/confirmForm.js" ])
    @vite([ "resources/js/admin/adminPostList.js" ])
@endpush

<div class="container shadow my-5 p-5 bg-white rounded-3 w-100">
    <div class="container d-flex justify-content-between align-items-center mb-5">
        <h1>{{ $title }}</h1>
        <div class="d-flex flex-wrap gap-3">
            @if ($name === "activity")
                <a href="{{ route(Str::plural($name) . ".invite") }}">
                    <button class="btn btn-secondary" title="Invita utilizatori">
                        <img src="/assets/invite.svg" alt="invite" style="width: 20px; filter: invert(100%)">
                    </button>
                </a>
            @endif
            <a href="{{ route(Str::plural($name) . ".create") }}">
                <button class="btn btn-secondary">
                    +
                </button>
            </a>
        </div>
    </div>

    <ul class="list-group mb-5" style="list-style: none">
        @forelse($posts as $post)
            <li class="list-group-item ">
                @if ($post->thumbnail !== null)
                    <img src="{{ $post->thumbnail }}" alt="thumbnail" class="mb-3">
                @endif
                <div class="d-flex gap-3 align-items-center">
                    <a
                        href="{{ route(Str::plural($name) . ".show", [ $name => $post ]) }}"
                        class="text-black me-auto"
                    >
                        <h2>{{ $post->title }}</h2>
                    </a>
                    <form
                        enctype="multipart/form-data"
                        method="POST"
                        action="{{ route(Str::plural($name) . ".upload.thumbnail", [$name => $post]) }}"
                        id="upload-form"
                    >
                        @csrf
                        @method('PUT')

                        <input
                            type="file" name="upload" id="upload-form-input" hidden
                            accept="image/*"
                        >
                        <button type="button" class="btn btn-primary" id="upload-form-button">
                            Thumbnail
                        </button>
                    </form>
                    @if ($name === "activity")
                        <a href="{{ route("activities.participants", ["activity" => $post]) }}">
                            <button type="button" class="btn btn-primary">
                                Participanti
                            </button>
                        </a>
                    @endif
                    <a href="{{ route(Str::plural($name) . ".edit", [$name => $post]) }}">
                        <button type="button" class="btn btn-dark">
                            Edit
                        </button>
                    </a>
                    <form
                        method="POST"
                        action="{{ route(Str::plural($name) . ".destroy", [$name => $post]) }}"
                        class="confirm-form"
                    >
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-danger">
                            Sterge
                        </button>
                    </form>
                </div>
            </li>
        @empty
            <li class="list-group-item text-center my-5">{{ $empty }}</li>
        @endforelse
    </ul>
    {{ $posts->links() }}
</div>
