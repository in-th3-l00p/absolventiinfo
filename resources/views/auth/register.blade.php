@extends("layouts.main")

@section("content")
    <form
        method="POST"
        action="{{ route("register.submit") }}"
        class="container my-5 grid"
    >
        @csrf

        <div class="row">
            <h1 class="col mb-5">Inregistreaza-te</h1>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="first_name">Nume:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old("first_name") }}">
                @error('first_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="col">
                <label for="last_name">Prenume:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old("last_name") }}">
                @error('last_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old("email") }}">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="promotion_year">An de absolvire:</label>
                <select id="promotion_year" name="promotion_year" class="form-select">
                    @foreach(range(1600, now()->year) as $year)
                        @if ($year === old("promotion_year"))
                            <option value="{{ $year }}" selected>{{ $year }}</option>
                        @else
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="col">
                <label for="class">Clasa:</label>
                <select id="class" name="class" class="form-select">
                    @foreach(["A", "B", "C", "D", "E"] as $class)
                        @if ($class === old("$class"))
                            <option value="{{ $class }}" selected>{{ $class }}</option>
                        @else
                            <option value="{{ $class }}">{{ $class }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="phone_number">Numar de telefon:</label>
                <input type="tel" id="phone_number" name="phone_number" class="form-control" value="{{ old("phone_number") }}">
                @error('phone_number')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="password">Parola:</label>
                <input type="password" id="password" name="password" class="form-control">
                @error('password')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-5">
            <div class="col">
                <label for="password_confirmation">Confirmare parola:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                @error('password_confirmation')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-dark">Inregistreaza-te</button>
    </form>
@endsection
