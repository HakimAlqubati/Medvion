<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

#[Fillable([
    'name',
    'email',
    'user_type',
    'password',
    'phone',
    'city',
    'address',
    'specialization_id',
    'specialty',
    'qualification_id',
    'qualification',
    'graduation_year',
    'workplace',
    'email_verified_at'
])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements \Filament\Models\Contracts\FilamentUser
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->user_type === \App\Enums\UserTypeEnum::ADMIN
                && $this->hasAnyRole(['admin', 'editor', 'moderator', 'super_admin']);
        }

        return false;
    }

    public function isAdmin(): bool
    {
        return $this->user_type === \App\Enums\UserTypeEnum::ADMIN;
    }

    public function isStudent(): bool
    {
        return $this->user_type === \App\Enums\UserTypeEnum::STUDENT;
    }

    public function specialization(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Specialization::class);
    }

    public function qualificationRecord(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Qualification::class, 'qualification_id');
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at'  => 'datetime',
            'password'           => 'hashed',
            'graduation_year'    => 'integer',
            'specialization_id'  => 'integer',
            'qualification_id'   => 'integer',
            'user_type'          => \App\Enums\UserTypeEnum::class,
        ];
    }

    protected static function booted(): void
    {
        static::saving(function ($user) {
            if ($user->isDirty('specialization_id') && $user->specialization_id) {
                $spec = Specialization::find($user->specialization_id);
                if ($spec) {
                    $user->specialty = $spec->name;
                }
            }
            if ($user->isDirty('qualification_id') && $user->qualification_id) {
                $qual = Qualification::find($user->qualification_id);
                if ($qual) {
                    $user->qualification = $qual->name;
                }
            }
        });
    }
}
