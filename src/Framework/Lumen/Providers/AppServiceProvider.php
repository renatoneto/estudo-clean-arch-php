<?php

namespace App\Providers;

use App\Repositories\UserRepositoryEloquent;
use App\Validation\UserValidation;
use Illuminate\Support\ServiceProvider;
use Skp\Application\Repository\UserRepositoryInterface;
use Skp\Domain\Validation\UserValidationInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // validation
        $this->app->bind(UserValidationInterface::class, UserValidation::class);

        // repositories
        $this->app->bind(UserRepositoryInterface::class, UserRepositoryEloquent::class);
    }

}
