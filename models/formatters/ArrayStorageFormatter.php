<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

use sergeylisitsyn\settingsStorage\components\ValueTypeFormatterInterface;

class ArrayStorageFormatter implements ValueTypeFormatterInterface
{
    public function format($value)
    {
        return unserialize($value);
    }
}
