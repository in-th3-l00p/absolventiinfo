<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "title", "content", "user_id", "visibility", "thumbnail"
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
