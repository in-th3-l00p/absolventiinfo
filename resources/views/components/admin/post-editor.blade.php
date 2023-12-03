@extends("layouts.admin")

@push("styles")
    @vite([ "resources/sass/editor.scss" ])
@endpush

@push("scripts")
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        var content = `{!! $post->content !!}`;
        var updateRoute = `{{ route("api." . Str::plural($name) . ".update", [ $name => $post ]) }}`;
        var uploadRoute = `{{ route(Str::plural($name) . ".upload", [ $name => $post ]) }}`
        var id = `{{ $post->id }}`;
    </script>
    @vite(["resources/js/editor.js"])
@endpush

@section("content")
    <form
        method="POST"
        action="{{ route(Str::plural($name) . ".update", [ $name => $post ]) }}"
        class="d-flex flex-wrap align-items-center justify-content-between container py-3"
        id="main-form"
    >
        @csrf
        @method("PUT")

        <label for="title" hidden>Titlu</label>
        <input
            class="bg-transparent border-0"
            style="font-size: 2rem"
            name="title"
            id="title"
            value="{{ $post->title }}"
        >

        <button type="submit" hidden></button>

        <label for="visibility" hidden>Visibilitate</label>
        <select name="visibility" id="visibility">
            <option
                value="public"
                @if ($post->visibility === "public")
                    selected
                @endif
            >
                Public
            </option>
            <option
                value="private"
                @if ($post->visibility === "private")
                    selected
                @endif
            >
                Privat
            </option>
        </select>
    </form>
    <div id="editor"></div>
@endsection
