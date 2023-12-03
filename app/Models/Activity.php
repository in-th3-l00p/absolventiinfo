<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        "title", "content", "visibility",
        "start", "end",
        "can_join", "max_joins", "join_expire",
        "user_id"
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    // return the first paragraph of the content
    public function getDescription() {
        $start = strpos($this->content, "<p>");
        $end = strpos($this->content, "</p>");

        return substr($this->content, $start + 3, $end - $start - 3);
    }
}
