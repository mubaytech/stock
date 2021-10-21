<?php

namespace App\Models\Tenant;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Api\Parking\Models\RoleSetting
 *
 * @property int $id
 * @property int $role_id
 * @property int $setting_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting whereRoleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property mixed $value
 * @method static \Illuminate\Database\Eloquent\Builder|RoleSetting whereValue($value)
 */
class RoleSetting extends Pivot
{
    use OnTenant;
    public $incrementing = true;
    public $timestamps=true;
}
