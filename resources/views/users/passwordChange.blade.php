@extends("layouts.main")

@section("content")
    <form
        class="container my-5"
        method="POST"
        action="{{ route("users.password.submit") }}"
    >
        @csrf
        @method("PUT")

        <h1 class="mb-3">Schimba parola prestabilita</h1>
        <p class="mb-5">Din motive de securitate, parola stabilita in mailul primit trebuie schimbata:</p>

        <div class="mb-5">
            <label for="password">Parola:</label>
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
        <div class="mb-5">
            <label for="password_confirmation">Confirmare parola:</label>
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

        <button type="submit" class="btn btn-primary btn-dark">
            Schimba parola
        </button>
    </form>
@endsection
