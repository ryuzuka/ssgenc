<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //1) 직접 바인드
        // $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);

        //2) 배열 바인드
        // $toBind = [
        //     UserRepository::class => PostgresUser::class,
        //     // All repositories are registered in this map
        // ];

        // foreach ($toBind as $interface => $implementation) {
        //     $this->app->bind($interface, $implementation);
        // }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
