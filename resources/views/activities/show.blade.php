@extends("layouts.main")

@push("styles")
    @vite(["resources/sass/post.scss", "resources/sass/activityShow.scss"])
    <link rel="stylesheet" href="/ckeditor/content-styles.css">
@endpush

@section("content")
    <section class="container my-5">
        <div id="content-container">
            <div id="activity-date" class="shadow bg-white rounded-3 p-5 text-center">
                <span @class([
                    "d-block mb-4 pb-2 border-bottom" =>
                        $activity->can_join &&
                        Request::user() !== null &&
                        Request::user()->role === "user"
                ])>
                    <h3 class="mb-3">Data evenimentului</h3>
                    <p>Incepe pe: {{ \Carbon\Carbon::make($activity->start) }}</p>
                    <p>Se termina pe: {{ \Carbon\Carbon::make($activity->end) }}</p>
                </span>

                @auth
                    @if (
                            $activity->can_join && Request::user() !== null &&
                            Request::user()->role === "user"
                    )
                        <p class="text-muted">
                            {{ $activity->getAcceptedCount() }} / {{ $activity->max_joins }} participanti inscrisi
                        </p>
                        <x-join-button :activity="$activity" />
                        <p class="mt-3 mb-0">
                            @if ($joined)
                                @if ($accepted)
                                    Ai fost acceptat!
                                @else
                                    Solicitarea de a participa a fost trimisa!
                                @endif
                            @endif
                        </p>
                    @endif
                @endauth
            </div>
            <div id="content" class="shadow bg-white rounded-3 p-5">
                <div class="mb-3 pb-3 border-bottom">
                    <h1>{{ $activity->title }}</h1>
                    <p class="text-secondary">Creat pe: {{ $activity->created_at }}</p>
                    <p class="text-secondary">Scris de: {{ $user->first_name . " " . $user->last_name }}</p>
                </div>

                <div class="ck-content content">{!! $activity->content !!}</div>
            </div>
        </div>
    </section>
@endsection
