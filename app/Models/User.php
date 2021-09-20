<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fb_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'settings' => 'array'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Retrieve a setting with a given name or fall back to the default.
     *
     */
    public function setting(string $name, $default = null)
    {
        if (array_key_exists($name, $this->settings)) {
            return $this->settings[$name];
        }
        return $default;
    }

    /**
     * Update one or more settings and then optionally save the model.
     *
     */
    public function settings(array $revisions, bool $save = true): self
    {
        $this->settings = array_merge($this->settings, $revisions);

        if ($save) {
            $this->save();
        }
        return $this;
    }

    public function getProfilePhotoUrlAttribute()
    {

        $path = $this->profile_photo_path;

        if (Storage::disk($this->profilePhotoDisk())->exists($path)) {
            return Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path);
        } elseif (!empty($path)) {
            // Use Photo URL from Social sites link...
            return $path;
        } else {
            //empty path. Use defaultProfilePhotoUrl
            return $this->defaultProfilePhotoUrl();
        }
    }
}
