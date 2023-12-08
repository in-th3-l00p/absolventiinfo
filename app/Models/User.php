<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'promotion_year',
        'class',
        'phone_number',
        'description',
        'email',
        'password',
        'cv_link',
        'linkedin_link',
        'instagram_link',
        'facebook_link',
        'pfp_path'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function announcements(): HasMany {
        return $this->hasMany(Announcement::class);
    }

    public function created_activities(): HasMany {
        return $this->hasMany(Activity::class);
    }

    public function activities(): BelongsToMany {
        return $this->belongsToMany(
            Activity::class,
            "user_activity",
            "user_id",
            "activity_id"
        );
    }
}
