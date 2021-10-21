<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tenant\Nationalite
 *
 * @property int $id
 * @property string $slug
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nationalite whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Nationalite extends Model
{
    use HasFactory;
}
