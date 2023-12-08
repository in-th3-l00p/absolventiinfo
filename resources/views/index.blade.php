@extends("layouts.main")

@section("content")
    <div
        class="text-center bg-image" style="
            background-image: url('/assets/brasov.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            height: 400px;"
    >
        <div class="mask w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center w-100 h-100">
                <div class="text-white">
                    <h1 class="mb-3">AbsolventInfo</h1>
                    <h4 class="mb-3">O platforma dedicata absolventilor de info</h4>
                    @guest
                        <a
                            class="btn btn-outline-light btn-lg"
                            href="{{ route("register") }}"
                            role="button"
                        >
                            Inregistreaza-te
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 pt-5 text-center border-bottom bg-white">
        <h1 class="display-4 fw-bold">Despre noi</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Suntem comunitatea absolventilor Colegiului National de Informatica “Grigore Moisil” din Brasov. Un scop al nostru este sa promovam in societate principiile si valorile care ne definesc, ca absolventi ai unei scoli de prestigiu national. In acelasi timp dorim sa fim un sprijin real pentru colegiu si sa ne implicam in rezolvarea provocarilor pe care le au elevii si profesorii acestuia.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <a href="{{ route("announcements.index") }}">
                    <button type="button" class="btn btn-dark btn-lg px-4 me-sm-3">Anunturi</button>
                </a>
                <a href="{{ route("activities.index") }}">
                    <button type="button" class="btn btn-dark btn-lg px-4 me-sm-3">Activitati</button>
                </a>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img
                    src="/assets/info.jpg"
                    class="img-fluid border rounded-3 shadow-lg mb-4"
                    alt="CNI Grigore Moisil"
                    width="700" height="500"
                    loading="lazy"
                >
            </div>
        </div>
    </div>
@endsection
