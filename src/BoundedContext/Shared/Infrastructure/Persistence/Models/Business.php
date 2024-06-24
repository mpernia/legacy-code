<?php

namespace Src\BoundedContext\Shared\Infrastructure\Persistence\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Business extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'website',
        'email',
        'password',
        'slug',
        'is_active',
        'last_login_at',
        'created_by_id',
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $dates = [
        'last_login_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getLastLoginAtAttribute(string $value): ?string
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('setting.date_format') . ' ' . config('setting.time_format')) : null;
    }

    public function setLastLoginAtAttribute(string $value): void
    {
        $this->attributes['last_login_at'] = $value ? Carbon::createFromFormat(config('setting.date_format') . ' ' . config('setting.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
