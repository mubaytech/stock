<?php

namespace App\Models\Tenant;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Tenancy\Affects\Connections\Support\Traits\OnTenant;

/**
 * App\Api\Parking\Models\UserSetting
 *
 * @property int $id
 * @property int $user_id
 * @property int $setting_id
 * @property mixed $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser whereSettingId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SettingUser whereValue($value)
 * @mixin \Eloquent
 */
class SettingUser extends Pivot
{
    use OnTenant;
    public $incrementing = true;
    public $timestamps=true;
}
