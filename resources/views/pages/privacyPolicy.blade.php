@extends("layouts.main")

@section("content")
    <section class="p-3 p-lg-5">
        <h1 class="mb-3">{{ __("Politica de procesare a datelor") }}</h1>
        <p class="mb-5">{{ __("privacy.introduction") }}</p>

        <div class="mb-5">
            <h2>{{ __("privacy.collect") }}</h2>
            <p>{{ __("privacy.collect_content") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("privacy.use") }}</h2>
            <p>{{ __("privacy.use_content") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("privacy.protection") }}</h2>
            <p>{{ __("privacy.protection_content") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("privacy.rights") }}</h2>
            <p>{{ __("privacy.rights_content") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("privacy.cookies") }}</h2>
            <p>{{ __("privacy.cookies_content") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("privacy.modify") }}</h2>
            <p>{{ __("privacy.modify_content") }}</p>
        </div>

        <div class="mb-5">
            <h2>{{ __("privacy.contact") }}</h2>
            <p>{{ __("privacy.contact_content") }} <span class="fw-bold">{{ env("MAIL_USERNAME") }}</span>.</p>
        </div>
    </section>
@endsection
