<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

use sergeylisitsyn\settingsStorage\components\ValueTypeFormatterInterface;

class BooleanStorageFormatter implements ValueTypeFormatterInterface
{
    public function format($value)
    {
        return $set->value ? true : false;
    }
}
