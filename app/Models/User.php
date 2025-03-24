<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Entity\Bookmark;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements FilamentUser
{
    use Billable, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'money',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    //Функция для доступа с определенного почтового домена
    public function canAccessPanel(Panel $panel): bool
    {
        if (app()->environment('local')) {
            //не требует верификации почты
            return str_ends_with($this->email, '@gmail.com');
        } else {
            // Продакшен или другое окружение
            return str_ends_with($this->email, '@yourdomain.com') && $this->hasVerifiedEmail();
        }
    }
}
