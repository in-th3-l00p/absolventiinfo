@extends("layouts.main")

@section("content")
    <section class="p-3 p-lg-5">
        <h1 class="mb-3">{{ __("Politica de Cookies pentru AbsolventiInfo") }}</h1>
        <p class="mb-5">{{ __("cookies.introduction") }}</p>

        <div class="mb-5">
            <h2>{{ __("Ce sunt cookies?") }}</h2>
            <p>{{ __("cookies.explanation") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("Cum folosim cookies-urile?") }}</h2>
            <p>{{ __("cookies.use") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("Modificări ale Politicii de Cookies") }}</h2>
            <p>{{ __("cookies.contact") }} <span class="fw-bold">{{ env("MAIL_USERNAME") }}</span>.</p>
        </div>
    </section>
@endsection
