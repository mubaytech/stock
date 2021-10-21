<?php

namespace App\Models\Tenant;

use Franzose\ClosureTable\Models\ClosureTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Models\Tenant\UnitesDeMesureClosure
 *
 * @property int $closure_id
 * @property int $ancestor
 * @property int $descendant
 * @property int $depth
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesureClosure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesureClosure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesureClosure query()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesureClosure whereAncestor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesureClosure whereClosureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesureClosure whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesureClosure whereDescendant($value)
 * @mixin \Eloquent
 */
class UnitesDeMesureClosure extends ClosureTable
{
    use HasFactory;
    use OnTenant;

    protected $table = 'unites_de_mesure_closures';
}
