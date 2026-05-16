<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

// -------------------
// Model Imports
// -------------------

use App\Models\UserRole;
use App\Models\Subscription;
use App\Models\Payment;

// -------------------
// User Model
// -------------------

/**
 * -------------------
 * IDE Helper Methods
 * -------------------
 *
 * @method bool hasVerifiedEmail()
 * @method bool markEmailAsVerified()
 * @method void sendEmailVerificationNotification()
 * @method bool hasActiveSubscription()
 *
 * @property int $id
 * @property int $role_id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string|null $phone
 * @property string|null $avatar
 * @property string $status
 * @property bool $has_active_subscription
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, MustVerifyEmailTrait;

    // -------------------
    // Table
    // -------------------

    protected $table = 'su_users';


    // -------------------
    // Fillable
    // -------------------

    protected $fillable = [
        'role_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'why_join',
        'password',
        'avatar',
        'status',
        'has_active_subscription', // optional (can be removed later)
    ];


    // -------------------
    // Hidden
    // -------------------

    protected $hidden = [
        'password',
        'remember_token',
    ];


    // -------------------
    // Casts
    // -------------------

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'has_active_subscription' => 'boolean',
    ];


    // -------------------
    // Role Relationship
    // -------------------

    public function role(): BelongsTo
    {
        return $this->belongsTo(UserRole::class, 'role_id');
    }


    // -------------------
    // Subscriptions Relationship
    // -------------------

    public function subscriptions(): HasMany
    {
        return $this->hasMany(
            Subscription::class,
            'user_id'
        );
    }


    // -------------------
    // Latest Subscription
    // -------------------

    public function latestSubscription(): HasOne
    {
        return $this->hasOne(
            Subscription::class,
            'user_id'
        )->latestOfMany();
    }


    // -------------------
    // Active Subscription
    // -------------------

    public function activeSubscription(): HasOne
    {
        return $this->hasOne(
            Subscription::class,
            'user_id'
        )
        ->where('status', 'active')
        ->where(function (Builder $query) {
            $query->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
        });
    }


    // -------------------
    // Check Active Subscription (FIXED FOR IDE)
    // -------------------

    public function hasActiveSubscription(): bool
    {
        return (bool) $this->activeSubscription()->exists();
    }


    // -------------------
    // Payments Relationship
    // -------------------

    public function payments(): HasMany
    {
        return $this->hasMany(
            Payment::class,
            'user_id'
        );
    }


    // -------------------
    // Full Name Accessor
    // -------------------

    public function getFullNameAttribute(): string
    {
        return trim($this->first_name . ' ' . $this->last_name);
    }


    // -------------------
    // Check If Admin
    // -------------------

    public function isAdmin(): bool
    {
        return optional($this->role)->slug === 'admin';
    }


    // -------------------
    // Check If Active
    // -------------------

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    // -------------------
    // FULL NAME ACCESSOR
    // -------------------
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // -------------------
    // USER LOGS RELATIONSHIP
    // -------------------
    public function logs(): HasMany
    {
        return $this->hasMany(UserLog::class, 'user_id');
    }

    // -------------------
    // LAST LOGIN LOG
    // -------------------
    public function lastLoginLog()
    {
        return $this->hasOne(UserLog::class, 'user_id')
            ->where('type', 'login')
            ->latest('created_at');
    }
}