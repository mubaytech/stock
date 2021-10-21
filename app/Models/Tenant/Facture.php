<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Api\Stock\Models\Facture
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Facture newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Facture newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Facture query()
 * @mixin \Eloquent
 * @property int $id
 * @property int $user_id
 * @property int $transaction_id
 * @property string $montant
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereMontant($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Facture whereUserId($value)
 */
class Facture extends Model
{
    use OnTenant;
    //
}
