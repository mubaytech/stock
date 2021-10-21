<?php
namespace App;

use Franzose\ClosureTable\Models\ClosureTable;

/**
 * App\NodeClosure
 *
 * @property int $ancestor
 * @property int $depth
 * @property int $descendant
 * @method static \Illuminate\Database\Eloquent\Builder|NodeClosure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NodeClosure newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|NodeClosure query()
 * @mixin \Eloquent
 */
class NodeClosure extends ClosureTable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categorie_closure';
}
