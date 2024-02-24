@extends("layouts.main")

@section("content")
    <section class="p-3 p-lg-5">
        <h1 class="mb-3">{{ __("Contact") }}</h1>
        <p class="mb-5">{{ __("contact.introduction") }}</p>

        <div class="mx-auto" style="max-width: 800px;">
            <form
                id="contact-form"
                name="contact-form"
                method="POST"
                action="{{ route("contact.submit") }}"
            >
                @csrf

                @if (session("success"))
                    <div class="alert alert-success">
                        {{ session("success") }}
                    </div>
                @endif

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="name" class="">{{ __("Numele tău") }}</label>
                            <input
                                type="text" id="name" name="name" class="form-control"
                                value="{{ old("name") }}"
                            >
                            @error("name")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <label for="email" class="">{{ __("Adresa ta de email") }}</label>
                            <input
                                type="text" id="email" name="email" class="form-control"
                                value="{{ old("email") }}"
                            >
                            @error("email")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <label for="subject" class="">{{ __("Subiect") }}</label>
                            <input
                                type="text" id="subject" name="subject" class="form-control"
                                value="{{ old("subject") }}"
                            >
                            @error("subject")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="col-md-12">
                        <div class="md-form">
                            <label for="message">{{ __("Mesaj") }}</label>
                            <textarea
                                type="text" id="message" name="message" rows="2" class="form-control md-textarea"
                            >{{ old("message") }}</textarea>
                            @error("message")
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-dark" onclick="document.getElementById('contact-form').submit();">{{ __("Trimite") }}</a>
            </div>
        </div>
    </section>
@endsection
