<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tenant\Commande
 *
 * @property int $id
 * @property int $depot_id
 * @property int $user_id
 * @property int|null $client_id
 * @property string|null $type
 * @property string|null $etat
 * @property string|null $age
 * @property string|null $date_expiration
 * @property string $date
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande query()
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDateExpiration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDepotId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereEtat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Commande whereUserId($value)
 * @mixin \Eloquent
 */
class Commande extends Model
{
    use HasFactory;
}
