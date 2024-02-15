@extends("layouts.main")

@section("content")
    <section class="p-3 p-lg-5">
        <h1 class="mb-3">{{ __("Termeni și condiții") }}</h1>
        <p class="mb-5">{{ __("termsAndConditions.introduction") }}</p>

        <div class="mb-5">
            <h2>{{ __("1. Drepturi de autor") }}</h2>
            <p>{{ __("termsAndConditions.authorRights") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("2. Utilizarea site-ului") }}</h2>
            <p>{{ __("termsAndConditions.use") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("3. Confidențialitate ") }}</h2>
            <p>{{ __("termsAndConditions.use") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("4. Contact") }}</h2>
            <p>{{ __("termsAndConditions.contact") }} <span class="fw-bold">{{ env("MAIL_USERNAME") }}</span>.</p>
        </div>
    </section>
@endsection
