@extends("layouts.admin")

@section("content")
    <section class="flex-grow-1 d-flex h-100">
        <x-admin-sidebar />
        <div class="container my-5 p-5 bg-white rounded-3 w-100">
            <div class="container d-flex justify-content-between align-items-center">
                <h1>Activitati</h1>
                <a href="#">
                    <button class="btn btn-secondary">
                            +
                    </button>
                </a>
            </div>
        </div>
    </section>
@endsection
