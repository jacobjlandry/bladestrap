<?php

namespace JacobLandry\Bladestrap;

use JacobLandry\Bladestrap\Models\Element;
use JacobLandry\Bladestrap\Models\Head;
use JacobLandry\Bladestrap\Models\Form;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladestrapServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('bladestrap', function() {
            return Head::setup();
        });

        Blade::directive('alert', function ($expression) {
            return "<?php \JacobLandry\Bladestrap\Models\Element::alert({$expression}); ?>";
        });
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}