@extends("layouts.admin")

@push("scripts")
    @vite([
        "resources/js/confirmForm.js",
        "resources/js/admin/users.js"
    ])
@endpush

@section("content")
    <section class="flex-grow-1 d-flex h-100">
        <x-admin-sidebar />

        <div class="container shadow my-5 p-5 bg-white rounded-3 w-100">
            <div class="container d-flex justify-content-between align-items-center mb-5">
                <h1>Conturi</h1>

                <form>
                    <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Cauta dupa nume"
                            aria-label="Cauta dupa nume"
                            aria-describedby="search-btn"
                            id="search-input"
                            name="search"
                        >
                        <button
                            class="btn btn-outline-secondary"
                            type="button"
                            id="search-btn"
                        >
                            <img
                                src="/assets/search.svg"
                                alt="search"
                                style="width: 20px"
                            >
                        </button>
                    </div>
                </form>

                <form
                    method="POST"
                    action="{{ route("users.upload") }}"
                    id="upload-form"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <input type="file" name="file" id="file" hidden>
                    <button type="button" id="upload-btn" class="btn btn-secondary">
                        +
                    </button>
                </form>
            </div>
            @error("file")
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror

            <ul class="list-group mb-5" style="list-style: none">
                @forelse ($users as $user)
                    <li class="list-group-item d-flex gap-3 align-items-center">
                        <div class="me-auto">
                            <a
                                href="{{ route("users.show", ["user" => $user]) }}"
                                class="text-black"
                            >
                                <h2>{{ $user->first_name . " " . $user->last_name }}</h2>
                            </a>
                            <p>Email: {{ $user->email }}</p>
                            <p>Rol: {{ $user->role }}</p>
                            <p>Inregistrat pe data de: {{ $user->created_at }}</p>
                            <p>An de absolvire: {{ $user->promotion_year }}</p>
                            <p>Clasa: {{ $user->class }}</p>
                            <p>Numar de telefon: {{ $user->phone_number }}</p>
                            <p>Descriere: {{ $user->description }}</p>
                        </div>

                        <form
                            method="POST"
                            action="{{ route("users.destroy", [ "user" => $user ]) }}"
                            class="confirm-form"
                        >
                            @csrf
                            @method("DELETE")

                            <button type="submit" class="btn btn-danger">
                                Sterge
                            </button>
                        </form>
                        <a href="{{ route("users.edit", ["user" => $user]) }}">
                            <button type="button" class="btn btn-dark">
                                Edit
                            </button>
                        </a>
                    </li>
                @empty
                    <li class="list-group-item text-center my-5">Nu exista niciun cont ???</li>
                @endforelse
            </ul>
            {{ $users->links() }}
        </div>
    </section>
@endsection
