<?php
namespace sergeylisitsyn\settingsStorage\models\formatters;

class ArrayStorageFormatter
{
    public function format($value)
    {
        return unserialize($value);
    }
}
