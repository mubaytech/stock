<?php

namespace App\Models\Tenant;

use Franzose\ClosureTable\Models\Entity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Models\Tenant\UnitesDeMesure
 *
 * @property int $id
 * @property int|null $unites_de_mesure_id
 * @property int $position
 * @property string $nom
 * @property string $slug
 * @property string|null $symbole
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Franzose\ClosureTable\Extensions\Collection|UnitesDeMesure[] $children
 * @property-read int|null $children_count
 * @property int $parent_id
 * @property-read UnitesDeMesure|null $parent
 * @method static \Franzose\ClosureTable\Extensions\Collection|static[] all($columns = ['*'])
 * @method static Builder|Entity ancestors()
 * @method static Builder|Entity ancestorsOf($id)
 * @method static Builder|Entity ancestorsWithSelf()
 * @method static Builder|Entity ancestorsWithSelfOf($id)
 * @method static Builder|Entity childAt($position)
 * @method static Builder|Entity childNode()
 * @method static Builder|Entity childNodeOf($id)
 * @method static Builder|Entity childOf($id, $position)
 * @method static Builder|Entity childrenRange($from, $to = null)
 * @method static Builder|Entity childrenRangeOf($id, $from, $to = null)
 * @method static Builder|Entity descendants()
 * @method static Builder|Entity descendantsOf($id)
 * @method static Builder|Entity descendantsWithSelf()
 * @method static Builder|Entity descendantsWithSelfOf($id)
 * @method static Builder|Entity firstChild()
 * @method static Builder|Entity firstChildOf($id)
 * @method static Builder|Entity firstSibling()
 * @method static Builder|Entity firstSiblingOf($id)
 * @method static \Franzose\ClosureTable\Extensions\Collection|static[] get($columns = ['*'])
 * @method static Builder|Entity lastChild()
 * @method static Builder|Entity lastChildOf($id)
 * @method static Builder|Entity lastSibling()
 * @method static Builder|Entity lastSiblingOf($id)
 * @method static Builder|Entity neighbors()
 * @method static Builder|Entity neighborsOf($id)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure newQuery()
 * @method static Builder|Entity nextSibling()
 * @method static Builder|Entity nextSiblingOf($id)
 * @method static Builder|Entity nextSiblings()
 * @method static Builder|Entity nextSiblingsOf($id)
 * @method static Builder|Entity prevSibling()
 * @method static Builder|Entity prevSiblingOf($id)
 * @method static Builder|Entity prevSiblings()
 * @method static Builder|Entity prevSiblingsOf($id)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure query()
 * @method static Builder|Entity sibling()
 * @method static Builder|Entity siblingAt($position)
 * @method static Builder|Entity siblingOf($id)
 * @method static Builder|Entity siblingOfAt($id, $position)
 * @method static Builder|Entity siblings()
 * @method static Builder|Entity siblingsOf($id)
 * @method static Builder|Entity siblingsRange($from, $to = null)
 * @method static Builder|Entity siblingsRangeOf($id, $from, $to = null)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereSymbole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereUnitesDeMesureId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UnitesDeMesure whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UnitesDeMesure extends Entity
{
    use HasFactory;
    use OnTenant;

    const CHILDREN_RELATION_NAME = 'children';


    /**
     * ClosureTable model instance.
     *
     * @var \App\NodeClosure
     */
    protected $closure = UnitesDeMesureClosure::class;

    protected $fillable = ['nom', 'symbole','description'];

    public $timestamps = true;

    /**
     * Gets the short name of the "parent id" column.
     *
     * @return string
     */
    public function getParentIdColumn()
    {
        return 'unites_de_mesure_id';
    }

    public function scopeRoot(Builder $query): Builder
    {
        return $query->whereNull($this->getParentIdColumn());
    }


}
