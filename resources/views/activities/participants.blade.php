@extends("layouts.admin")

@section("content")
    <div class="container shadow my-5 p-5 bg-white rounded-3 w-100">
        <div class="mb-5">
            <h1>Participantii activitatii: {{ $activity->title }}</h1>
            @error("max_joins")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>


        <ul class="list-group">
            @forelse ($users as $user)
                <li class="list-group-item d-flex gap-3 align-items-center">
                    <div class="me-auto">
                        <a
                            href="{{ route("users.show", [ "user" => $user ]) }}"
                            class="text-black"
                        >
                            <h3>{{ $user->first_name . " " . $user->last_name }}</h3>
                        </a>
                        <p>Clasa: {{ $user->class }}</p>
                        <p>An de absolvire: {{ $user->promotion_year }}</p>
                    </div>

                    @if (!$user->pivot->accepted)
                        <form method="POST" action="{{ route("activities.accept", [
                            "activity" => $activity,
                            "user" => $user
                        ]) }}">
                            @csrf
                            @method("PUT")

                            <button type="submit" class="btn btn-primary">Accepta</button>
                        </form>

                        <form method="POST" action="{{ route("activities.reject", [
                            "activity" => $activity,
                            "user" => $user
                        ]) }}">
                            @csrf
                            @method("PUT")

                            <button type="submit" class="btn btn-danger">Respinge</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route("activities.reject", [
                            "activity" => $activity,
                            "user" => $user
                        ]) }}">
                            @csrf
                            @method("PUT")

                            <button type="submit" class="btn btn-danger">Sterge</button>
                        </form>
                    @endif
                </li>
            @empty
                <li class="list-group-item text-center my-5">Nu exista niciun participant</li>
            @endforelse
            {{ $users->links() }}
        </ul>
    </div>
@endsection
