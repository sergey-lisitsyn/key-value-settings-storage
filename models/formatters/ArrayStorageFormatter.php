<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

use sergeylisitsyn\settingsStorage\components\ValueTypeFormatterInterface;

class ArrayStorageFormatter implements ValueTypeFormatterInterface
{
    public function format($value)
    {
        return is_array($value) ? $value : null;
    }
}
