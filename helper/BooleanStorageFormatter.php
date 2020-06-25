<?php
namespace sergeylisitsyn\settingsStorage\helper;

class BooleanStorageFormatter
{
    public function format($value)
    {
        return (int) $set->value ? true : false;
    }
}
