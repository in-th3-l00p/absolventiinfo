@if (!$accepted)
    <div class="{{ $attributes->get("class") }}">
        <form
            method="POST"
            action="{{ route("activities.accept", [
                "activity" => $activity,
                "user" => $user
            ]) }}"
        >
            @csrf
            @method("PUT")

            <button type="submit" class="btn btn-primary">
                Accepta
            </button>
        </form>

        <form
            method="POST"
            action="{{ route("activities.reject", [
                                    "activity" => $activity,
                                    "user" => $user
                                ]) }}"
            class="confirm-form"
        >
            @csrf
            @method("PUT")

            <button type="submit" class="btn btn-danger">
                Respinge
            </button>
        </form>
    </div>
@else
    <form
        method="POST"
        action="{{ route("activities.reject", [
                                "activity" => $activity,
                                "user" => $user
                            ]) }}"
        class="{{ $attributes->class("confirm-form")->get("class") }}"
    >
        @csrf
        @method("PUT")

        <button type="submit" class="btn btn-danger">
            Sterge
        </button>
    </form>
@endif
