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
    public static function alert($content, $level = 'primary', $dismissable = false, $animation = '', $classes = '', $ids = '')
    {
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
        return "<?php echo '<div id=\"$ids\" class=\"alert alert-$level $dismissable $animation $classes\">{$button}{$content}</div>'; ?>";
    }
}
