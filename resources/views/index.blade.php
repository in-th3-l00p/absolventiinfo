@extends("layouts.main")

@section("content")
    <!-- Hero -->
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
    <!-- Hero -->
@endsection
