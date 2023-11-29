@extends("layouts.main")

@section("content")
    <div class="container-fluid pt-5 h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                     class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                <form method="POST" action="{{ route("login.submit") }}">
                    @csrf

                    @error("email")
                        <p class="text-danger">{{ $message }}</p>
                    @enderror

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
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control form-control-lg"
                            placeholder="Introdu parola"
                        />
                        <label class="form-label" for="password">Parola</label>
                    </div>

                    <div class="d-flex flex-column gap-3 justify-content-between align-items-start">
                        <!-- Checkbox -->
                        <div class="form-check mb-0">
                            <input
                                class="form-check-input me-2"
                                type="checkbox"
                                id="remember-me"
                                name="remember-me"
                            />
                            <label class="form-check-label" for="remember-me">Tine-ma minte</label>
                        </div>
                        <a href="#" class="text-body">Ai uitat parola? (todo)</a>
                    </div>

                    <div class="text-center text-lg-start mt-4 pt-2">
                        <button
                            type="submit"
                            class="btn btn-dark btn-primary btn-lg"
                            style="padding-left: 2.5rem; padding-right: 2.5rem;"
                        >
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
