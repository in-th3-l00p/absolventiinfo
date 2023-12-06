@extends("layouts.main")

@section("content")
    <main class="container mt-5 bg-white p-5 rounded-3 shadow">
        <section class="grid pb-5 mb-5 border-bottom">
            <div class="row">
                <img
                    src="/assets/default-profile.png"
                    alt="profile"
                    class="col-2 me-5 rounded-3 border-2"
                >
                <div class="col">
                    <h2>{{ $user->first_name . " " . $user->last_name }}</h2>
                    <p>{{ $user->description }}</p>
                </div>
            </div>
        </section>
        <section @class([ "mb-3" => $current_user ])>
            <div class="row">
                <div class="col">
                    <h3>Informatii</h3>
                    <p>An de absolvire: {{ $user->promotion_year }}</p>
                    <p>Clasa: {{ $user->class }}</p>
                </div>
                @if ($current_user)
                    <div class="col-1">
                        <a href="{{ route("users.edit", ["user" => $user]) }}">
                            <button class="btn btn-dark">Editeaza</button>
                        </a>
                    </div>
                @endif
            </div>
        </section>
        @if ($current_user)
            <section>
                <h3>Informatii private</h3>
                <p>Email: {{ $user->email }}</p>
                <p>Numar de telefon: {{ $user->phone_number }} </p>
            </section>
        @endif
    </main>
@endsection
