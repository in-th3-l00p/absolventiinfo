@extends("layouts.main")

@section("content")
    <main class="container my-5 bg-white p-5 rounded-3 shadow">
        <section class="grid pb-5 mb-5 border-bottom">
            <div class="row d-flex flex-wrap gap-5">
                <img
                    src="{{ $user->pfp_path ? "/storage/" . $user->pfp_path :  "/assets/default-profile.png" }}"
                    alt="profile"
                    class="col-2 me-5 rounded-3 border-2"
                    style="width: 178px; height: 154px;"
                >
                <div class="col">
                    <h2>{{ $user->first_name . " " . $user->last_name }}</h2>
                    <p>{{ $user->description }}</p>
                    @if ($user->role === "admin")
                        <p>Administrator</p>
                    @endif
                    @if ($user->cv_link)
                        <a href="{{ $user->cv_link }}" class="text-black">
                            <p>Link CV: {{ $user->cv_link }}</p>
                        </a>
                    @endif
                    @if ($user->facebook_link)
                        <a href="{{ $user->facebook_link }}" class="text-black">
                            <p>Link Facebook: {{ $user->facebook_link }}</p>
                        </a>
                    @endif
                    @if ($user->instagram_link)
                        <a href="{{ $user->instagram_link }}" class="text-black">
                            <p>Link Instagram: {{ $user->instagram_link }}</p>
                        </a>
                    @endif
                    @if ($user->linkedin_link)
                        <a href="{{ $user->linkedin_link }}" class="text-black">
                            <p>Link LinkedIn: {{ $user->linkedin_link }}</p>
                        </a>
                    @endif
                </div>
            </div>
        </section>
        <section class="d-flex flex-column gap-3">
            @if ($current_user)
                <div>
                    <a href="{{ route("users.edit", ["user" => $user]) }}">
                        <button class="btn btn-dark">Editeaza</button>
                    </a>
                </div>
            @endif
            <div>
                <h3>Informatii</h3>
                <p>An de absolvire: {{ $user->promotion_year }}</p>
                <p>Clasa: {{ $user->class }}</p>
            </div>
            @if ($current_user || Request::user() !== null && Request::user()->role === "admin")
                <div>
                    <h3>Informatii private</h3>
                    <p>Email: {{ $user->email }}</p>
                    <p>Numar de telefon: {{ $user->phone_number }} </p>
                </div>
            @endif

            @if (Request::user() !== null && Request::user()->role === "admin")
                <div>
                    <h3>Activitati la care participa</h3>

                    <ul class="list-group">
                        @forelse($user->activities()->withPivot("accepted")->get() as $activity)
                            <li class="list-group-item grid">
                                <div class="row">
                                    <a
                                        href="{{ route("activities.show", ["activity" => $activity]) }}"
                                        class="text-black col"
                                    >
                                        <h3>{{ $activity->title }}</h3>
                                    </a>
                                    <p class="col">
                                        @if ($activity->pivot->accepted)
                                            Acceptat
                                        @else
                                            In asteptare
                                        @endif
                                    </p>

                                    <x-admin.participant-actions
                                        :user="$user"
                                        :activity="$activity"
                                        :accepted="$activity->pivot->accepted"
                                        class="col d-flex gap-3 justify-content-end align-items-center flex-wrap"
                                    />
                                </div>
                            </li>

                        @empty
                            <li class="list-group-item">
                                Utilizatorul nu participa la nicio activitate
                            </li>
                        @endforelse
                    </ul>
                </div>
            @endif
        </section>
    </main>
@endsection
