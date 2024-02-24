<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function view() {
        return view("pages.contact");
    }

    public function submit(Request $request) {
        $request->validate([
            "name" => "required|max:255",
            "email" => "required|email|max:255",
            "subject" => "required|max:255",
            "message" => "required|max:3000"
        ], [
            "name.required" => __("Numele este obligatoriu."),
            "name.max" => __("Numele nu poate avea mai mult de 255 de caractere."),
            "email.required" => __("Adresa de email este obligatorie."),
            "email.email" => __("Adresa de email nu este validă."),
            "email.max" => __("Adresa de email nu poate avea mai mult de 255 de caractere."),
            "subject.required" => __("Subiectul este obligatoriu."),
            "subject.max" => __("Subiectul nu poate avea mai mult de 255 de caractere."),
            "message.required" => __("Mesajul este obligatoriu."),
            "message.max" => __("Mesajul nu poate avea mai mult de 3000 de caractere.")
        ]);

        $submission = ContactSubmission::create([
            "name" => $request->name,
            "email" => $request->email,
            "subject" => $request->subject,
            "message" => $request->message
        ]);

        Mail
            ::to(config("mail.mailers.smtp.username"))
            ->queue(new \App\Mail\ContactSubmissionMail($submission));

        return back()
            ->with("success",  __("Mulțumim pentru mesajul dumneavoastră."));
    }
}
