<?php
namespace sergeylisitsyn\settingsStorage\helper;

class ArrayStorageFormatter
{
    public function format($value)
    {
        return unserialize($value);
    }
}
