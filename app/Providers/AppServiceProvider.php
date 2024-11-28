<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use App\Http\Repositories\RoleRepository;
use App\Http\Repositories\Impl\RoleRepositoryImpl;

class AppServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        $this->app->bind(RoleRepository::class, RoleRepositoryImpl::class);
    }

    
    public function boot()
    {
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
    }
}
