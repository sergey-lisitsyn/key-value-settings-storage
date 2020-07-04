<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

use sergeylisitsyn\settingsStorage\components\ValueTypeFormatterInterface;

class DefaultStorageFormatter implements ValueTypeFormatterInterface
{
    
    public function format($value)
    {
        return $value;
    }
}
