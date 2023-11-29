@extends("layouts.admin")

@push("styles")
    @vite([ "resources/sass/editor.scss" ])
@endpush

@push("scripts")
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        var content = `{!! $announcement->content !!}`;
        var updateRoute = `{{ route("api.announcements.update", [ "announcement" => $announcement ]) }}`;
        var id = `{{ $announcement->id }}`;
    </script>
    @vite(["resources/js/editor.js"])
@endpush

@section("content")
    <form
        method="POST"
        action="{{ route("announcements.update", [ "announcement" => $announcement ]) }}"
        class="d-flex flex-wrap align-items-center justify-content-between container py-3"
        id="main-form"
    >
        @csrf
        @method("PUT")

        <label for="title" hidden>Title</label>
        <input
            class="bg-transparent border-0"
            style="font-size: 2rem"
            name="title"
            id="title"
            value="{{ $announcement->title }}"
        >

        <button type="submit" hidden></button>

        <label for="visibility" hidden>Visibility</label>
        <select name="visibility" id="visibility">
            <option
                value="public"
                @if ($announcement->visibility === "public")
                    selected
                @endif
            >
                Public
            </option>
            <option
                value="private"
                @if ($announcement->visibility === "private")
                    selected
                @endif
            >
                Private
            </option>
        </select>
    </form>
    <div id="editor"></div>
@endsection
