<?php
namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\TraitsFolder\BladeDirectives;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Blade::directive('permission', function ($permission){
            return "<?php if(auth()->check() && auth()->user()->roles()->first()->permissions()->where('slug', $permission)->count()) :?>";
        });

        \Blade::directive('endpermission', function ($role){
            return "<?php endif; ?>";
        });
    }
}