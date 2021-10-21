<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tenant\Depot
 *
 * @property int $id
 * @property int|null $image_id
 * @property string $nom
 * @property string $slug
 * @property string $region
 * @property string $ville
 * @property string $adresse_1
 * @property string $email
 * @property string $contact_1
 * @property string|null $contact_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Depot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Depot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Depot query()
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereAdresse1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereContact1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereContact2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Depot whereVille($value)
 * @mixin \Eloquent
 */
class Depot extends Model
{
    use HasFactory;
}
