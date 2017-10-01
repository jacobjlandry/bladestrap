<?php

namespace JacobLandry\Bladestrap\Models;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    /**
     * Handle a bootstrap alert
     *
     * @param $expression
     * @return string
     */
    public static function alert($expression)
    {
        // separate options
        $options = explode(",", $expression);

        // grab content
        if(isset($options[0])) {
            $content = trim($options[0]);
        }
        else {
            $content = '';
        }

        // grab alert level
        if(isset($options[1])) {
            $level = trim($options[1]);
        }
        else {
            $level = 'primary';
        }

        // dismissable or not
        if(isset($options[2])) {
            $dismissable = 'alert-dismissable';
            $button = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        }
        else {
            $dismissable = '';
            $button = '';
        }

        // animation (if dismissable)
        if(isset($options[3])) {
            $animation = trim($options[3]);
        }
        else {
            $animation = '';
        }

        // output html for alert
        return "<?php echo '<div class=\"alert alert-$level $dismissable $animation\">{$button}{$content}</div>'; ?>";
    }
}
