@extends("layouts.main")

@section("content")
    <form
        class="container my-5 grid"
        method="POST"
        action="{{ route("users.update.password") }}"
    >
        @csrf
        @method("PUT")

        <div class="row">
            <h1 class="col mb-5">Schimba parola</h1>
        </div>
        <div class="row mb-5">
            <label for="current_password">Parola curenta:</label>
            <input
                type="password"
                name="current_password"
                id="current_password"
                class="form-control"
            >
            @error("current_password")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mb-5">
            <label for="password">Parola noua:</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control"
            >
            @error("password")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mb-5">
            <label for="password_confirmation">Confirma parola noua:</label>
            <input
                type="password"
                name="password_confirmation"
                id="password_confirmation"
                class="form-control"
            >
            @error("password_confirmation")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="row mb-5">
            <button class="btn btn-dark mx-auto">Salveaza</button>
        </div>
    </form>
@endsection
