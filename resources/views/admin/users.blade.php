@extends("layouts.admin")

@section("content")
    <section class="flex-grow-1 d-flex h-100">
        <x-admin-sidebar />

        <div class="container shadow my-5 p-5 bg-white rounded-3 w-100">
            <h1>Conturi</h1>

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
