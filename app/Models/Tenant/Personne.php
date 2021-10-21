<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Tenant\Personne
 *
 * @property int $id
 * @property int|null $image_id
 * @property int|null $image_piece_identite_id
 * @property int|null $nationalite_id
 * @property string $nom
 * @property string|null $date_de_naiss
 * @property string|null $cni
 * @property string|null $contact_1
 * @property string|null $sexe
 * @property string|null $email
 * @property string|null $contact_2
 * @property string|null $adresse_1
 * @property string|null $adresse_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\Tenant\FileModel|null $image
 * @property-read \App\Models\Tenant\FileModel|null $imagePieceIdentite
 * @property-read \App\Models\Tenant\Nationalite|null $nationalite
 * @property-read \App\Models\Tenant\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Personne newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personne newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Personne query()
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereAdresse1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereAdresse2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereCni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereContact1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereContact2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereDateDeNaiss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereImagePieceIdentiteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereNationaliteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereSexe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Personne whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Personne extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'date_de_naiss',
        'cni',
        'contact_1',
        'sexe',
        'email',
        'contact_2',
        'adresse_1',
        'adresse_2',
    ];

    public function image(): BelongsTo
    {
        return $this->belongsTo(FileModel::class, 'image_id');
    }

    public function imagePieceIdentite(): BelongsTo
    {
        return $this->belongsTo(FileModel::class, 'image_piece_identite_id');
    }

    public function nationalite(): BelongsTo
    {
        return $this->belongsTo(Nationalite::class, 'nationalite_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
