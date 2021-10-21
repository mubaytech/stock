<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Tenancy\Affects\Filesystems\Events\ConfigureDisk;

class ConfigureTenantDisk
{
    public function handle(ConfigureDisk $event)
    {

       if($event->event->tenant){
//           dd($event);
           $event->config = [
               'driver' => 'local',
               'root' => storage_path('app/' . $event->event->tenant->getTenantKey()),
           ];
       }
    }
}
