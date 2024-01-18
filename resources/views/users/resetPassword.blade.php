@extends("layouts.main")

@section("content")
    <form
        class="container my-5"
        method="POST"
        action="{{ route("resetPassword.update", [
            "token" => $token,
            "email" => $email
        ]) }}"
    >
        @csrf
        @method('PUT')

        <h1 class="mb-5">Introdu noua parola</h1>

        @error("email")
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

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

        <button type="submit" class="btn btn-dark btn-primary btn-lg">Continua</button>
    </form>
@endsection
