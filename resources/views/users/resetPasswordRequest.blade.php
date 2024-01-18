@extends("layouts.main")

@section("content")
    <form
        class="container my-5"
        method="POST"
        action="{{ route("resetPassword.submit") }}"
    >
        @csrf

        <h1 class="mb-3">Schimba parola</h1>
        <p class="mb-5">Introdu adresa de email</p>

        @if (session("status"))
            <div class="alert alert-success">{{ session("status") }}</div>
        @endif


        <!-- Email input -->
        <div class="form-outline mb-4">
            <input
                type="email"
                id="email"
                name="email"
                class="form-control form-control-lg"
                placeholder="Introdu adresa de email"
            />
            <label class="form-label" for="email">Adresa de email</label>
            @error("email")
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark btn-primary btn-lg">Continua</button>
    </form>
@endsection
