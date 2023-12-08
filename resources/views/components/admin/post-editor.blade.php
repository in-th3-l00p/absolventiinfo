@extends("layouts.admin")

@push("styles")
    @vite([ "resources/sass/editor.scss" ])
@endpush

@push("scripts")
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        var content = `{!! $post->content !!}`;
        var uploadRoute = `{{ route(Str::plural($name) . ".upload", [ $name => $post ]) }}`
    </script>
    @vite(["resources/js/editor.js"])
@endpush

@section("content")
    <form
        method="POST"
        action="{{ $updateRoute }}"
        class="d-flex flex-wrap gap-3 align-items-center container py-3"
        id="main-form"
    >
        @csrf
        @method("PUT")

        <label for="title" hidden>Titlu</label>
        <input
            class="bg-transparent border-0 me-auto"
            style="font-size: 2rem"
            name="title"
            id="title"
            value="{{ $post->title }}"
        >

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
        <input type="text" name="content" id="content" hidden>
        <button type="submit" id="submit" class="btn btn-primary">
            Salveaza
        </button>
    </form>
    <div id="editor"></div>
@endsection
