@extends("layouts.admin")

@section("content")
    <section class="flex-grow-1 d-flex h-100">
        <x-admin-sidebar />
        <x-admin.post-list
            title="Anunturi"
            name="announcement"
            empty="Nu exista niciun anunt"
            :posts="$announcements"
        />
    </section>
@endsection
