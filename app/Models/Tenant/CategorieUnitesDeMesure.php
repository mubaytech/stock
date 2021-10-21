<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Models\Tenant\CategorieUnitesDeMesure
 *
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieUnitesDeMesure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieUnitesDeMesure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieUnitesDeMesure query()
 * @mixin \Eloquent
 */
class CategorieUnitesDeMesure extends Model
{
    use HasFactory;
    use OnTenant;
}
