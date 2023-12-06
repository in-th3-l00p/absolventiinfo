@extends("layouts.main")

@push("scripts")
    @vite(["resources/js/confirmForm.js"])
@endpush

@section("content")
    <main class="container my-5 bg-white p-5 rounded-3 shadow">
        <h1 class="mb-5">Lista de activitati unde te-ai inscris:</h1>
        <ul class="list-group mb-5">
            @forelse ($activities as $activity)
                <li class="list-group-item d-flex flex-wrap gap-3">
                    <div class="me-auto">
                        <a
                            href="{{ route("activities.show", [ "activity" => $activity ]) }}"
                            class="text-black"
                        >
                            <h3>{{ $activity->title }}</h3>
                        </a>
                        <p>{{ $activity->getDescription() }}</p>

                        <div class="border-top border-bottom mb-3 pt-3">
                            <p>Incepe pe: {{ \Carbon\Carbon::make($activity->start) }}</p>
                            <p>Se termina pe: {{ \Carbon\Carbon::make($activity->end) }}</p>
                        </div>

                        @php $joined = $activity->isJoined(Request::user()); @endphp
                        @if ($joined["joined"])
                            <p class="fw-bold">{{ $joined["accepted"] ?
                                    "Ai fost acceptat!" :
                                    "Solicitarea de a participa a fost trimisa!"
                            }}</p>
                        @endif
                    </div>
                    <x-join-button class="my-auto" :activity="$activity" />
                </li>
            @empty
                <li class="list-group-item">Nu te-ai inscris in nicio activitate</li>
            @endforelse
        </ul>
        {{ $activities->links() }}
    </main>
@endsection
