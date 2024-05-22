<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SearchableTrait, SoftDeletes, LogsActivity;

    protected $guarded = [];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $searchable = [
        'columns' => [
            'name' => 10,
        ],
    ];

    /*
     * Setup
     */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logUnguarded();
    }

    /*
     * Attributes
     */

    public function setNewPasswordAttribute($value)
    {
        if (is_null($value)) {
            return;
        }
        $this->attributes['password'] = Hash::make($value);
    }

    public function getAvatarAttribute()
    {
        if($this->photo) {
            return cache()->rememberForever('avatar:' . $this->id, function () {
                $photo = Storage::temporaryUrl(
                    $this->photo, now()->addMinutes(5)
                );
                $content = file_get_contents($photo);
                $type = pathinfo($photo, PATHINFO_EXTENSION);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($content);
                return $base64;
            });
        }
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));
    }

    public function setPhotoAttribute($value)
    {
        cache()->forget('avatar:' . $this->id);
        $this->attributes['photo'] = $value;
    }
}
