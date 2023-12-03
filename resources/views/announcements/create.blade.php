@extends("layouts.main")

@section("content")
    <form
        method="POST"
        action="{{ route("announcements.store") }}"
        class="container my-5 grid"
    >
        @csrf

        <div class="row">
            <h1 class="col mb-5">Creeaza anunt</h1>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="title">Titlu:</label>
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
        </div>

        <button type="submit" class="btn btn-dark mx-auto">Creaza</button>
    </form>
@endsection
