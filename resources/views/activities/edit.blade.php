@extends("layouts.admin")

@push("scripts")
    @vite([ "resources/js/activityForm.js" ])
@endpush

@section("content")
    <form
        class="container my-5 grid"
        method="POST"
        action="{{ route("activities.update", ["activity" => $activity]) }}"
    >
        @csrf
        @method("PUT")

        <div class="row">
            <h1 class="col mb-5">Activitatea: {{ $activity->title }}</h1>
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
                    value="{{ $activity->title }}"
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
                    value="{{ $activity->start }}"
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
                    value="{{ $activity->end }}"
                >

                @error("end")
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col d-flex align-items-center gap-3">
                <label for="can_join">Evenimentul permite participare:</label>
                <input
                    type="checkbox"
                    name="can_join"
                    id="can_join"
                    class="form-check"
                    {{ $activity->can_join ? "checked" : "" }}
                >
            </div>
            <div class="col">
                <label for="visibility">Visibilitate:</label>
                <select name="visibility" id="visibility" class="form-select">
                    <option
                        value="public"
                        {{ $activity->visibility === "public" ? "selected" : "" }}
                    >
                        Public
                    </option>
                    <option
                        value="private"
                        {{ $activity->visibility === "private" ? "selected" : "" }}
                    >
                        Privat
                    </option>
                </select>
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
                        value="{{ $activity->max_joins }}"
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
                        value="{{ $activity->join_expire }}"
                    >
                    @error("join_expire")
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </span>

        <div class="d-flex gap-3">
            <button type="submit" class="btn btn-dark">Editeaza</button>
            <a href="{{ route("activities.edit.content", [ "activity" => $activity ]) }}">
                <button
                    type="button"
                    class="btn btn-primary"
                >
                    Modifica continut
                </button>
            </a>
        </div>
    </form>
@endsection
