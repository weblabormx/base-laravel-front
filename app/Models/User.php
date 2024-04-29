<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
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
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim('MyEmailAddress@example.com ')));
    }
}
