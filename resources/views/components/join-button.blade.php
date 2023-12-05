<form
    method="POST"
    action="{{ route("activities.join", [ "activity" => $activity ]) }}"
    class="align-self-center"
>
    @csrf
    <button
        {{ $attributes->class([
            "btn btn-lg",
            "btn-primary" => !$joined,
            "btn-secondary" => $joined,
        ]) }}
        @disabled($accepted)
    >
        @if ($joined)
            Renunta
        @else
            Inscrie-te
        @endif
    </button>
</form>
