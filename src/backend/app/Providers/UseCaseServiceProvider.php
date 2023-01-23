<?php

declare(strict_types=1);

namespace App\Providers;

use App\Packages\UseCases\GetCustomerUsecase;
use Illuminate\Support\ServiceProvider;

class UseCaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(
            GetCustomerUsecase::class,
            GetCustomerUsecase::class
        );
    }
}
