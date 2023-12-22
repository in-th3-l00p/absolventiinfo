@extends("layouts.main")

@push("styles")
    @vite([ "resources/sass/index.scss" ])
@endpush

@section("content")
     <section class="grid container py-4">
        <div class="row flex-column flex-md-row gap-5 mb-5">
            <div class="col px-4">
                <h2 class="row mb-5 fs-1 fw-semibold">Platformă dedicată tutoror absolvenților liceului de informatică Brașov</h2>
                @guest
                    <div class="row flex-column flex-sm-row gap-5">
                        <a class="d-block p-0 col" href="{{ route("login") }}"><button class="w-100 btn btn-dark">Înregistrează-te</button></a>
                        <a class="d-block p-0 col" href="{{ route("register") }}"><button class="w-100 btn btn-outline-dark">Loghează-te</button></a>
                    </div>
                @endguest
                @auth
                    <div class="row flex-column flex-sm-row gap-5">
                        <a class="d-block p-0 col" href="{{ route("activities.index") }}"><button class="w-100 btn btn-dark">Activități</button></a>
                        <a class="d-block p-0 col" href="{{ route("announcements.index") }}"><button class="w-100 btn btn-outline-dark">Anunțuri</button></a>
                    </div>
                @endauth
            </div>
            <div class="col justify-content-center position-relative">
                <img
                    src="/assets/trofee.jpeg"
                    alt="Imagine de fundal"
                    class="img-fluid h-100 object-fit-cover rounded-5"
                >

                <div class="position-absolute top-0 left-0 bg-white py-2 px-4 rounded-5 mt-3 ms-3 ms-md-4 mt-md-4">
                    Activități
                </div>
                <div
                    class="position-absolute bottom-0 left-0 bg-white py-2 px-4 rounded-5 mb-3 ms-3 me-5 ms-md-4 mb-md-4 activity-text"
                >
                    Participă la activitățile organizate pentru absolvenții de info
                </div>
                <a
                    href="{{ route("activities.index") }}"
                    class="d-block position-absolute mt-3 me-3 me-md-4 mt-md-4"
                    style="top: 0; right: 0; transform: translateX(-50%);"
                >
                    <button class="btn btn-light bg-white p-1" style="aspect-ratio: 1/1; border-radius: 50%;">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.75 21.25L21.25 8.75" stroke="black" style="stroke:black;stroke-opacity:1;" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.75 8.75H21.25V21.25" stroke="black" style="stroke:black;stroke-opacity:1;" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
        <div class="row flex-column flex-md-row gap-5">
            <div class="col h-100">
                <p class="mb-0 fs-5">
                    Suntem comunitatea absolventilor Colegiului National de Informatica “Grigore Moisil”
                    din Brasov. Un scop al nostru este sa promovam in societate principiile si valorile
                    care ne definesc, ca absolventi ai unei scoli de prestigiu national. In acelasi timp
                    dorim sa fim un sprijin real pentru colegiu si sa ne implicam in rezolvarea provocarilor
                    pe care le au elevii si profesorii acestuia.
                </p>
            </div>
            <div class="col ms-md-5 bubble rounded-5 p-4 position-relative">
                <h2 class="fs-1 mb-5">Anunțuri</h2>
                <p class="fs-5">Află ultimele noutați din cadrul liceului, în fiecare săptămână</p>

                <a
                    href="{{ route("announcements.index") }}"
                    class="d-block position-absolute mt-3 me-3 me-md-4 mt-md-4"
                    style="top: 0; right: 0; transform: translateX(-50%);"
                >
                    <button class="btn btn-light bg-white p-1" style="aspect-ratio: 1/1; border-radius: 50%;">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8.75 21.25L21.25 8.75" stroke="black" style="stroke:black;stroke-opacity:1;" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8.75 8.75H21.25V21.25" stroke="black" style="stroke:black;stroke-opacity:1;" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection
