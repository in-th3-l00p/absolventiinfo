@extends("layouts.main")

@section("content")
    <div
        class="text-center bg-image" style="
            background-image: url('https://mdbcdn.b-cdn.net/img/new/slides/041.webp');
            background-repeat: no-repeat;
            background-size: cover;
            height: 400px;"
    >
        <div class="mask w-100 h-100" style="background-color: rgba(0, 0, 0, 0.6);">
            <div class="d-flex justify-content-center align-items-center w-100 h-100">
                <div class="text-white">
                    <h1 class="mb-3">Heading</h1>
                    <h4 class="mb-3">Subheading</h4>
                    <a class="btn btn-outline-light btn-lg" href="#!" role="button">Call to action</a>
                </div>
            </div>
        </div>
    </div>

    <div class="px-4 pt-5 text-center border-bottom bg-white">
        <h1 class="display-4 fw-bold">bam bam bim bim</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed at dolor quis ex dignissim tincidunt. Integer eu sapien id tortor bibendum cursus. Vivamus feugiat massa ut odio bibendum, nec cursus ligula tempor.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn btn-dark btn-lg px-4 me-sm-3">Primary button</button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img
                    src="/assets/stock1.jpg"
                    class="img-fluid border rounded-3 shadow-lg mb-4"
                    alt="Example image"
                    width="700" height="500"
                    loading="lazy"
                >
            </div>
        </div>
    </div>
@endsection
