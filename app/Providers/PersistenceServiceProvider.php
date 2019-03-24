<?php

declare(strict_types = 1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

final class PersistenceServiceProvider extends ServiceProvider
{
    public function register()
    {
        $driver = config('persistence.driver');

        $config = config("persistence.repository-gateways");

        foreach ($config as $gatewayInterface => $gatewayConcretions) {
            $this->app->singleton($gatewayInterface, $gatewayConcretions[$driver]);
        }
    }
}
