@extends("layouts.main")

@section("content")
    <form
        class="container my-5 grid"
        method="POST"
        action="{{ route("users.update", ["user" => $user]) }}"
    >
        @csrf
        @method("PUT")

        <h1 class="row mb-5">Editeaza profil</h1>
        <div class="row mb-5">
            <div class="col ps-0">
                <label for="first_name">Nume:</label>
                <input
                    type="text"
                    name="first_name"
                    id="first_name"
                    class="form-control"
                    value="{{ $user->first_name }}"
                >
                @error("first_name")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col pe-0">
                <label for="last_name">Prenume:</label>
                <input
                    type="text"
                    name="last_name"
                    id="last_name"
                    class="form-control"
                    value="{{ $user->last_name }}"
                >
                @error("last_name")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-5">
            <label for="description">Descriere:</label>
            <textarea
                class="form-control"
                name="description"
                id="description"
            >{{ $user->description }}</textarea>
            @error("description")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mb-5">
            <label for="email">Email:</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control"
                value="{{ $user->email }}"
            >
            @error("email")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row mb-5">
            <div class="col ps-0">
                <label for="promotion_year">An de absolvire:</label>
                <select id="promotion_year" name="promotion_year" class="form-select">
                    @foreach(range(1600, now()->year) as $year)
                        @if ($year === $user->promotion_year)
                            <option value="{{ $year }}" selected>{{ $year }}</option>
                        @else
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endif
                    @endforeach
                </select>
                @error("promotion_year")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="col pe-0">
                <label for="class">Clasa:</label>
                <select id="class" name="class" class="form-select">
                    @foreach(["A", "B", "C", "D", "E"] as $class)
                        @if ($class === $user->class)
                            <option value="{{ $class }}" selected>{{ $class }}</option>
                        @else
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endif
                    @endforeach
                </select>
                @error("class")
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="row mb-5">
            <label for="phone_number">Numar de telefon</label>
            <input
                type="tel"
                name="phone_number"
                id="phone_number"
                class="form-control"
                value="{{ $user->phone_number }}"
            >
            @error("phone_number")
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-dark">Editeaza</button>
    </form>
@endsection
