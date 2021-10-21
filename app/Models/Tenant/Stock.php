<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Api\Stock\Models\Stock
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Stock query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $categorie_id
 * @property int|null $image_id
 * @property string $nom
 * @property string $slug
 * @property string|null $code_produit
 * @property string $prix_de_vente_unitaire
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCodeProduit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock wherePrixDeVenteUnitaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Stock whereUserId($value)
 */
class Stock extends Model
{
    use OnTenant;
    //
}
