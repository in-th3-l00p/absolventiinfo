@extends("layouts.main")

@section("content")
    <main class="container my-5 bg-white p-5 rounded-3 shadow">
        <section class="grid pb-5 mb-5 border-bottom">
            <div class="row d-flex flex-wrap gap-5">
                <img
                    src="/assets/default-profile.png"
                    alt="profile"
                    class="col-2 me-5 rounded-3 border-2"
                    style="width: 178px; height: 154px;"
                >
                <div class="col">
                    <h2>{{ $user->first_name . " " . $user->last_name }}</h2>
                    <p>{{ $user->description }}</p>
                </div>
            </div>
        </section>
        <section class="d-flex flex-column gap-3">
            @if ($current_user)
                <div>
                    <a
                        href="{{ route("users.edit", ["user" => $user]) }}"
                        class="d-block"
                    >
                        <button class="btn btn-dark">Editeaza</button>
                    </a>
                </div>
            @endif
            <div>
                <h3>Informatii</h3>
                <p>An de absolvire: {{ $user->promotion_year }}</p>
                <p>Clasa: {{ $user->class }}</p>
            </div>
            @if ($current_user)
                <div>
                    <h3>Informatii private</h3>
                    <p>Email: {{ $user->email }}</p>
                    <p>Numar de telefon: {{ $user->phone_number }} </p>
                </div>
            @endif
        </section>
    </main>
@endsection
