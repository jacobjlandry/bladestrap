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
        /**
         * Add the generic bootstrap headers to a page
         */
        Blade::directive('bladestrap', function() {
            return Head::setup();
        });

        /**
         * Generate a bootstrap alert
         *
         * @param $expression array
         */
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