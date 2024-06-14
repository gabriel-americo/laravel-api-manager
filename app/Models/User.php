<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name', 'user', 'email', 'sex', 'image', 'last_login', 'password', 'status', 'remember_token',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function ideaQuestions(): HasMany
    {
        return $this->hasMany(IdeaQuestion::class, 'user_id', 'id');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getStatusAttribute($value)
    {
        return $value === 1 ? 'Ativo' : 'Desativado';
    }

    public function getProfileImage()
    {
        $defaultImage = 'assets/media/avatars/blank.png';
        if ($this->image && File::exists(public_path('storage/img/users/' . $this->image))) {
            return 'storage/img/users/' . $this->image;
        }
        return $defaultImage;
    }
}
