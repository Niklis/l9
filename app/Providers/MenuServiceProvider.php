<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\View;
use Closure;
use Spatie\Navigation\Section;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Spatie\Navigation\Facades\Navigation;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        //$this->app->booted(function() {
        Route::matched(function () {

            $mainMenu = Navigation::make()
                ->add('Dashboard', route('dashboard'))
                ->add('Administartion', '', function (Section $section) {
                    $section
                        ->add('Users', route('users'))
                        ->add('Roles', '', function (Section $section) {
                            $section
                                ->add('Items', route('roles.items'));
                        })
                        ->add('Permissions', route('permissions'), function (Section $section) {
                            $section
                                ->add('Items', route('permissions.items'));
                        });
                });

            view()->share('mainMenu', $mainMenu->tree());
        });
    }
}
