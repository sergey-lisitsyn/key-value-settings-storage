<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

use sergeylisitsyn\settingsStorage\components\ValueTypeFormatterInterface;

class NumberStorageFormatter implements ValueTypeFormatterInterface
{
    public function format($value)
    {
        return floatval($value);
    }
}
