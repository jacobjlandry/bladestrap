<?php

namespace JacobLandry\Bladestrap\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    /**
     * Handle a bootstrap alert
     *
     * @param $arguments
     * @throws \Exception
     */
    public static function alert($arguments)
    {
        // grab content
        if(!isset($arguments['content'])) {
            throw new \Exception("Content is required for an alert!");
        }
        else {
            $content = $arguments['content'];
        }

        // grab reamining arguments or defaults
        $level = (isset($arguments['level'])) ? $arguments['level'] : 'primary';
        $dismissable = (isset($arguments['dismissable'])) ? $arguments['dismissable'] : false;
        $animation = (isset($arguments['animation'])) ? $arguments['animation'] : '';
        $classes = (isset($arguments['classes'])) ? $arguments['classes'] : '';
        $ids = (isset($arguments['ids'])) ? $arguments['ids'] : '';

        // dismissable or not
        if($dismissable) {
            $dismissable = 'alert-dismissable';
            $button = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
        else {
            $dismissable = '';
            $button = '';
        }

        // output html for alert
        echo "<div id=\"$ids\" class=\"alert alert-$level $dismissable $animation $classes\">{$button}{$content}</div>";
    }
}
