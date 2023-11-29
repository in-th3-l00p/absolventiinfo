@extends("layouts.main")

@section("content")
    <form
        method="POST"
        action="{{ route("announcements.store") }}"
        class="container d-flex flex-column gap-5 py-5"
    >
        @csrf

        <div class="form-group">
            <label for="title" class="mb-1">Titlu:</label>
            <input
                type="text"
                @class([
                    "form-control",
                    "is-invalid" => $errors->has("title")
                ])
                id="title"
                name="title"
                aria-describedby="title"
            >
            @error("title")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark mx-auto">Creaza</button>
    </form>
@endsection
