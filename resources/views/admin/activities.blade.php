@extends("layouts.admin")

@section("content")
    <section class="flex-grow-1 d-flex h-100">
        <x-admin-sidebar />
        <x-admin.post-list
            title="Activitati"
            name="activity"
            empty="Nu exista nicio activitate"
            :posts="$activities"
        />
    </section>
@endsection
