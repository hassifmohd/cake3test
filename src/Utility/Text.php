<?php
namespace App\Utility;

use Cake\Utility\Text as CakeText;

/**
 * Text handling methods.
 */
class Text extends CakeText
{
    public static function strlen($text, array $options = [])
    {
        return static::_strlen($text, $options);
    }
}
