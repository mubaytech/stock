<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\InputInterface;
use Tenancy\Identification\Contracts\Tenant as TenantContract;
use Tenancy\Identification\Drivers\Console\Contracts\IdentifiesByConsole;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;
use Tenancy\Identification\Drivers\Queue\Contracts\IdentifiesByQueue;
use Tenancy\Identification\Drivers\Queue\Events\Processing;

/**
 * App\Models\Tenant
 *
 * @property int $id
 * @property int $logo_id
 * @property string $slug
 * @property string $display
 * @property string $descri
 * @property string $tel1
 * @property string $tel2
 * @property string $adresse
 * @property string $mail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDescri($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereDisplay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereLogoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereTel1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereTel2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tenant whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tenant extends Model implements TenantContract, IdentifiesByConsole,
    IdentifiesByQueue, IdentifiesByHttp
{
    protected $connection = 'mysql';
//    use AllowsTenantIdentification;

    protected $fillable = [
        'slug',
        'display',
        'descri',
        'tel1',
        'tel2',
        'adresse',
        'email',
    ];
    protected $dispatchesEvents = [
        'created' => \Tenancy\Tenant\Events\Created::class,
        'updated' => \Tenancy\Tenant\Events\Updated::class,
        'deleted' => \Tenancy\Tenant\Events\Deleted::class,
    ];

    /**
     * The attribute of the Model to use for the key.
     *
     * @return string
     */
    public function getTenantKeyName(): string
    {
        return 'slug';
    }

    /**
     * The actual value of the key for the tenant Model.
     *
     * @return string|int
     */
    public function getTenantKey()
    {
        return $this->slug;
    }

    /**
     * A unique identifier, eg class or table to distinguish this tenant Model.
     *
     * @return string
     */
    public function getTenantIdentifier(): string
    {
        return get_class($this);
    }

    public function tenantIdentificationByConsole(InputInterface $input): ?TenantContract
    {
        if ($input->hasParameterOption('--tenant')) {
            return $this->query()
                ->where($this->getTenantKeyName(), $input->getParameterOption('--tenant'))
                ->first();
        }

        return null;
    }

    /**
     * Specify whether the tenant model is matching the request.
     *
     * @param Processing $event
     * @return Tenant
     */
    public function tenantIdentificationByQueue(Processing $event): ?TenantContract
    {
        if ($event->tenant) {
            return $event->tenant;
        }

        if ($event->tenant_key && $event->tenant_identifier === $this->getTenantIdentifier()) {
            return $this->newQuery()
                ->where($this->getTenantKeyName(), $event->tenant_key)
                ->first();
        }

        return null;
    }

    /**
     * Specify whether the tenant model is matching the request.
     *
     * @param Request $request
     * @return Tenant
     */
    public function tenantIdentificationByHttp(Request $request): ?TenantContract
    {
//        dd(preg_split('/\//', $request->path()));
        $slug = null;
        if ($request->is(
                ['api/*','graphql']
            )) {
            $slug = /*$request->header('X-TENANT-ID')||*/'stock_test_1';
        } elseif (count(preg_split('/\//', $request->path())) > 0 && strlen(($slug = preg_split('/\//', $request->path())[0]))) {
            $slug = $slug;
//            return null;
        }
        return $this->query()
            ->where('slug', $slug)
            ->first();
    }
}
