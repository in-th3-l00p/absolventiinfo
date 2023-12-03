@extends("layouts.main")

@push("scripts")
    @vite([ "resources/js/activityForm.js" ])
@endpush

@section("content")
    <form
        method="POST"
        action="{{ route("activities.store") }}"
        class="container my-5 grid"
    >
        @csrf

        <h1 class="row mb-5">Creeaza activitate</h1>

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

        <div class="row mb-5">
            <div class="col">
                <label for="start">Data de inceput:</label>
                <input
                    type="datetime-local"
                    @class([
                        "form-control",
                        "is-invalid" => $errors->has("start")
                    ])
                    id="start"
                    name="start"
                    aria-describedby="start"
                >
                @error("start")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="col">
                <label for="start">Data de terminare:</label>
                <input
                    type="datetime-local"
                    @class([
                        "form-control",
                        "is-invalid" => $errors->has("end")
                    ])
                    id="end"
                    name="end"
                    aria-describedby="end"
                >

                @error("end")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col d-flex gap-3">
                <label for="can_join">Evenimentul permite participare:</label>
                <input
                    type="checkbox"
                    name="can_join"
                    id="can_join"
                    class="form-check"
                    value="1"
                >
            </div>
        </div>

        <span id="has-join">
            <div class="row">
                <div class="col">
                    <label for="max_joins">Numar maxim de participanti:</label>
                    <input
                        type="number"
                        name="max_joins"
                        id="max_joins"
                        @class([
                            "form-control",
                            "is-invalid" => $errors->has("end")
                        ])
                    >
                    @error("max_joins")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col mb-5">
                    <label for="join_expire">Data de inchidere al inscrieri:</label>
                    <input
                        type="datetime-local"
                        name="join_expire"
                        id="join_expire"
                        @class([
                            "form-control",
                            "is-invalid" => $errors->has("end")
                        ])
                    >
                    @error("join_expire")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </span>

        <button type="submit" class="btn btn-dark mx-auto">Creaza</button>
    </form>
@endsection
