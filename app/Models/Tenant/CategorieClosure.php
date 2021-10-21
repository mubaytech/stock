<?php

namespace App\Models\Tenant;

use Franzose\ClosureTable\Models\ClosureTable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Models\Tenant\CategorieClosure
 *
 * @property int $closure_id
 * @property int $ancestor
 * @property int $descendant
 * @property int $depth
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieClosure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieClosure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieClosure query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieClosure whereAncestor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieClosure whereClosureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieClosure whereDepth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategorieClosure whereDescendant($value)
 * @mixin \Eloquent
 */
class CategorieClosure extends ClosureTable
{
    use HasFactory;
    use OnTenant;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorie_closures';

}
