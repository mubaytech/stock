<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Model;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Api\Stock\Models\PermissionUser
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermissionUser query()
 * @mixin \Eloquent
 */
class PermissionUser extends Model
{
    use OnTenant;
    //
}
