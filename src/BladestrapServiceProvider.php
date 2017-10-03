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
            // parse expression (really only helpful for debug purposes)
            $expression = explode(",", $expression);
            $content = trim($expression[0]);
            $level = isset($expression[1]) ? trim($expression[1]) : 'primary';
            $dismissable = isset($expression[2]) ? trim($expression[2]) : false;
            $animation = isset($expression[3]) ? trim($expression[3]) : 'fade show';
            $classes = isset($expression[4]) ? trim($expression[4]) : '';
            $ids = isset($expression[5]) ? trim($expression[5]) : '';

            return Element::alert($content, $level, $dismissable, $animation, $classes, $ids);
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