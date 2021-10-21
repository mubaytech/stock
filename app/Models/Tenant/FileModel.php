<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tenant\FileModel
 *
 * @property int $id
 * @property string|null $nom
 * @property string|null $url
 * @property string|null $path
 * @property string|null $thumbnail_url
 * @property string|null $thumbnail_path
 * @property string|null $type
 * @property int $exist
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereExist($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereThumbnailPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileModel whereUrl($value)
 * @mixin \Eloquent
 */
class FileModel extends Model
{
    protected $table = 'files';
    protected $fillable = [
        'nom',
        'path',
        'url',
        'thumbnail_path',
        'thumbnail_url',
        'type',
        'exist'
    ];
    use HasFactory;
}
