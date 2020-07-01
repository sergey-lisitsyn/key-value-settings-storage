<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

class BooleanStorageFormatter
{
    public function format($value)
    {
        return (int) $set->value ? true : false;
    }
}
