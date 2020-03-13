<?php

namespace App\Providers;

use App\Model\User;
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
        $this->app->bind(UserValidationInterface::class, UserValidation::class);
        $this->app->bind(UserRepositoryInterface::class, User::class);
    }
}
