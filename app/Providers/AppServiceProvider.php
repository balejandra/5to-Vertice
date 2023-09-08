<?php

namespace App\Providers;

use App\Models\Publico\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer("partials.menu.menu", function ($view) {
            $menus = Menu::getMenu(true);
            $view->with('menus', $menus);
        });
    }
}
