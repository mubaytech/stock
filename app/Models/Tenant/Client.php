<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Api\Stock\Models\Client
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Client newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Client query()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $user_id
 * @property int|null $image_id
 * @property string $type
 * @property string $nom
 * @property string $email
 * @property string $address_1
 * @property string $contact_1
 * @property string|null $contact_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereContact1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereContact2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Client whereUserId($value)
 */
class Client extends Model
{
    use OnTenant;
    //
}
