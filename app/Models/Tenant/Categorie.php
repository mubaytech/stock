<?php

namespace App\Models\Tenant;

use Franzose\ClosureTable\Models\Entity;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Models\Tenant\Categorie
 *
 * @property int $id
 * @property int|null $categorie_id
 * @property int|null $image_id
 * @property int $position
 * @property string $nom
 * @property string $slug
 * @property string $description
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read Categorie|null $categorie
 * @property-read \Franzose\ClosureTable\Extensions\Collection|Categorie[] $categories
 * @property-read int|null $categories_count
 * @property-read \Franzose\ClosureTable\Extensions\Collection|Categorie[] $children
 * @property-read int|null $children_count
 * @property int $parent_id
 * @property-read Categorie|null $parent
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
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie newQuery()
 * @method static Builder|Entity nextSibling()
 * @method static Builder|Entity nextSiblingOf($id)
 * @method static Builder|Entity nextSiblings()
 * @method static Builder|Entity nextSiblingsOf($id)
 * @method static Builder|Entity prevSibling()
 * @method static Builder|Entity prevSiblingOf($id)
 * @method static Builder|Entity prevSiblings()
 * @method static Builder|Entity prevSiblingsOf($id)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie query()
 * @method static Builder|Entity sibling()
 * @method static Builder|Entity siblingAt($position)
 * @method static Builder|Entity siblingOf($id)
 * @method static Builder|Entity siblingOfAt($id, $position)
 * @method static Builder|Entity siblings()
 * @method static Builder|Entity siblingsOf($id)
 * @method static Builder|Entity siblingsRange($from, $to = null)
 * @method static Builder|Entity siblingsRangeOf($id, $from, $to = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Categorie extends Entity
{
    use HasFactory;
    use OnTenant;

    const CHILDREN_RELATION_NAME = 'children';

    /**
     * ClosureTable model instance.
     *
     * @var \App\NodeClosure
     */
    protected $closure = CategorieClosure::class;

    protected $fillable = ['nom', 'description', 'description'];

    protected $guarded = ['children'];

    public $timestamps = true;

    /**
     * Gets the short name of the "parent id" column.
     *
     * @return string
     */
    public function getParentIdColumn()
    {
        return 'categorie_id';
    }

    public function scopeRoot(Builder $query): Builder
    {
        return $query->whereNull($this->getParentIdColumn());
    }

    public function image(): BelongsTo
    {
        return $this->belongsTo(FileModel::class, 'image_id');
    }

    public function unitesDeMesures()
    {
        return $this->belongsToMany(UnitesDeMesure::class);
    }

}
