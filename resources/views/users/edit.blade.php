@extends("layouts.main")

@push("scripts")
    @vite([ "resources/js/confirmForm.js" ])
@endpush

@section("content")
    <form
        class="container my-5 grid"
        method="POST"
        action="{{ route("users.update", ["user" => $user]) }}"
        enctype="multipart/form-data"
    >
        @csrf
        @method("PUT")

        <div class="row">
            <h1 class="col mb-5">Editeaza profil</h1>
        </div>
        <div class="row mb-5">
            <div class="col">
                <label for="first_name">Nume:</label>
                <input
                    type="text"
                    name="first_name"
                    id="first_name"
                    class="form-control"
                    value="{{ $user->first_name }}"
                >
                @error("first_name")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="last_name">Prenume:</label>
                <input
                    type="text"
                    name="last_name"
                    id="last_name"
                    class="form-control"
                    value="{{ $user->last_name }}"
                >
                @error("last_name")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <label for="description">Descriere:</label>
                <textarea
                    class="form-control"
                    name="description"
                    id="description"
                >{{ $user->description }}</textarea>
                @error("description")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <label for="email">Email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    class="form-control"
                    value="{{ $user->email }}"
                >
                @error("email")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <label for="promotion_year">An de absolvire:</label>
                <select id="promotion_year" name="promotion_year" class="form-select">
                    @foreach(range(1600, now()->year) as $year)
                        @if ($year === $user->promotion_year)
                            <option value="{{ $year }}" selected>{{ $year }}</option>
                        @else
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endif
                    @endforeach
                </select>
                @error("promotion_year")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col">
                <label for="class">Clasa:</label>
                <select id="class" name="class" class="form-select">
                    @foreach(["A", "B", "C", "D", "E"] as $class)
                        @if ($class === $user->class)
                            <option value="{{ $class }}" selected>{{ $class }}</option>
                        @else
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endif
                    @endforeach
                </select>
                @error("class")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
                <label for="phone_number">Numar de telefon</label>
                <input
                    type="tel"
                    name="phone_number"
                    id="phone_number"
                    class="form-control"
                    value="{{ $user->phone_number }}"
                >
                @error("phone_number")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="cv_link">Link CV <span class="text-muted fw-light">(optional)</span>:</label>
                <input
                    type="text"
                    id="cv_link"
                    name="cv_link"
                    class="form-control"
                    value="{{ $user->cv_link }}"
                >
                @error('cv_link')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="facebook_link">Link Facebook <span class="text-muted fw-light">(optional)</span>:</label>
                <input
                    type="text"
                    id="facebook_link"
                    name="facebook_link"
                    class="form-control"
                    value="{{ $user->facebook_link }}"
                >
                @error('facebook_link')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="instagram_link">Link Instagram <span class="text-muted fw-light">(optional)</span>:</label>
                <input
                    type="text"
                    id="instagram_link"
                    name="instagram_link"
                    class="form-control"
                    value="{{ $user->instagram_link }}"
                >
                @error('instagram_link')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="linkedin_link">Link LinkedIn <span class="text-muted fw-light">(optional)</span>:</label>
                <input
                    type="text"
                    id="linkedin_link"
                    name="linkedin_link"
                    class="form-control"
                    value="{{ $user->linkedin_link }}"
                >
                @error('linkedin_link')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="pfp">Imagine de profil: <span class="text-muted fw-light">(optional)</span>:</label>
                <input
                    type="file"
                    id="pfp"
                    name="pfp"
                    class="form-control"
                    value="{{ old("pfp") }}"
                >
                @error('pfp')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-dark">Editeaza</button>
        @if ($user->id === Request::user()->id)
            <a href="{{ route("users.edit.password") }}">
                <button type="button" class="btn btn-secondary">
                    Schimba parola
                </button>
            </a>
        @endif
    </form>
@endsection
