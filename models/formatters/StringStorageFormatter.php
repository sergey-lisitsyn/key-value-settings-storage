<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

use sergeylisitsyn\settingsStorage\components\ValueTypeFormatterInterface;

class StringStorageFormatter implements ValueTypeFormatterInterface
{
    public function format($value)
    {
        return $value;
    }
}
