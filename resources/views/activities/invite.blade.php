@extends("layouts.admin")

@section("content")
    <div class="container shadow my-5 p-5 bg-white rounded-3 w-100">
        <h1>Invita utilizatorii la o activitate:</h1>
        <form method="POST" action="{{ route("activities.invite.submit") }}">
            @csrf

            <div class="mb-3">
                <label for="activity">Activitatea</label>
                <select name="activity" id="activity" class="form-select">
                    @foreach ($activities as $activity)
                        <option value="{{ $activity->id }}">{{ $activity->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="text">Text:</label>
                <textarea
                    name="text"
                    id="text"
                    class="form-control"
                    rows="5"
                    placeholder="Textul invitației"
                ></textarea>
            </div>

            <button
                type="submit"
                class="btn btn-dark"
            >
                Trimite
            </button>
        </form>
    </div>
@endsection
