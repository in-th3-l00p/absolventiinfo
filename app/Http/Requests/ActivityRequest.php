<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    public function authorize(): bool {
        return true;
    }

    public function rules(): array {
        return [
            "title" => "required|min:1|max:50|unique:activities,title",
            "start" => "required|date",
            "end" => "required|date",
            "max_joins" => "nullable|numeric",
            "join_expire" => "nullable|date"
        ];
    }

    public function messages() {
        return [
            "title.required" => "Titlul este necesar",
            "title.max" => "Titlul trebuie sa aiba maxim 50 de caractere",
            "title.unique" => "Titlul este deja folosit",
            "start.required" => "Data de inceput este necesara",
            "end.required" => "Data de terminare este necesara"
        ];
    }
}
