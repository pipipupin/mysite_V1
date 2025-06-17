<?php

namespace App\Providers;

use App\Filament\Resources\ClientResource;
use App\Filament\Resources\OrderResource;
use App\Filament\Resources\AddressResource;
use Filament\Providers\FilamentServiceProvider as ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Регистрируем ресурсы для Filament
        Filament::registerResources([
            ClientResource::class,
            OrderResource::class,
            AddressResource::class,
        ]);
    }
}
