<?php

namespace App\Models\Tenant;

use App\Models\Tenant\Traits\AccessToken;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Joselfonseca\LighthouseGraphQLPassport\HasLoggedInTokens;
use Joselfonseca\LighthouseGraphQLPassport\HasSocialLogin;
use Joselfonseca\LighthouseGraphQLPassport\MustVerifyEmailGraphQL;
use Laravel\Passport\HasApiTokens;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;


/**
 * App\Models\Tenant\User
 *
 * @property int $id
 * @property int|null $depot_id
 * @property int $personne_id
 * @property string $username
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $username_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tenant\OauthAccessToken[] $accessTokens
 * @property-read int|null $access_tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \App\Models\Tenant\Depot|null $depot
 * @property-read \App\Models\Tenant\Personne $identite
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tenant\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tenant\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tenant\Setting[] $settings
 * @property-read int|null $settings_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDepotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePersonneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsernameVerifiedAt($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use HasFactory;
    use OnTenant;
    use Notifiable;
    use HasApiTokens;
    use AccessToken;

//    use HasSocialLogin;
//    use MustVerifyEmailGraphQL;
    use HasLoggedInTokens;

    protected $fillable = [
        'username',
        'password'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'username_verified_at' => 'datetime',
    ];

    public function depot(): BelongsTo
    {
        return $this->belongsTo(Depot::class);
    }

    public function identite(): BelongsTo
    {
        return $this->belongsTo(Personne::class, 'personne_id');
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class);
    }

    public function accessTokens(): HasMany
    {
        return $this->hasMany(OauthAccessToken::class);
    }

    public function settings()
    {
        return $this->belongsToMany(Setting::class)
            ->withPivot('value')->withTimestamps()->using(SettingUser::class);
    }


    public function hasRole($role = ''): bool
    {
        return in_array($role, $this->getRoles(), true);
    }

    public function getRoles(): array
    {
        //print_r($this->role()->where('type_role',$this->owner_type)->get()->pluck('name_role'));
        return $this->roles->pluck('nom')->toArray();
    }


    public function findForPassport($username)
    {
        return self::where('username', $username)->first();
    }
}
