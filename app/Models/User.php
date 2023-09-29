<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Conversation;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
//use Laravel\Sanctum\HasApiTokens; //HasApiTokens,
use Illuminate\Http\UploadedFile;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'profile_picture',
        'date_active',
        'date_inactive',
        'is_active',
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

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    // public function jobs()
    // {
    //     return $this->hasMany(Job::class);
    // }

    // public function proposals()
    // {
    //     return $this->hasMany(Proposal::class);
    // }
    public function proposals()
    {
        return $this->hasMany(Proposal::class)->orderBy('updated_at', 'desc');
    }

    public function jobs()
    {
        return $this->hasMany(Job::class)->orderBy('updated_at', 'desc');
    }

    public function conversations()
    {
        return Conversation::where(function ($q) {
            return $q->where('to', $this->id)
                ->orWhere('from', $this->id);
        });
    }

    public function getConversationsAttribute()
    {
        return $this->conversations()->get();
    }


    public function likes()
    {
        return $this->belongsToMany(Job::class);
    }

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function getProfilePictureUrlAttribute()
    {
        return asset('profile-pictures/' . $this->profile_picture);
    }

    public function getProfilePicturePathAttribute()
    {
        return public_path('profile-pictures/' . $this->profile_picture);
    }


}
