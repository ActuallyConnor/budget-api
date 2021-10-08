<?php

namespace App\Models;

use Budget\Users\User\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property int $id
 * @property mixed $uuid
 * @property string|null $f_name
 * @property string|null $l_name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $password
 * @property int $is_admin
 * @property string|null $address
 * @property string|null $city
 * @property string|null $province_state
 * @property string|null $country
 * @property string|null $postal_zip
 * @property string $locale
 * @property string|null $phone
 * @property string|null $dob
 * @property string|null $sex
 * @property mixed $settings
 * @property string|null $profile_image
 * @property int $active
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereFName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereLName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel wherePostalZip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereProfileImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereProvinceState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserModel whereUuid($value)
 * @mixin \Eloquent
 */
class UserModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param  User  $user
     */
    public static function write(User $user)
    {
        UserModel::create([
            'uuid' => $user->getUuid()->getBytes(),
            ''
        ]);
    }
}
