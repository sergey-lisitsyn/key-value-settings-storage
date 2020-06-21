<?php
namespace sergeylisitsyn\settingsStorage\components;

interface SystemSettingStorageInterface
{
    public function get($key);
    
    public function set($key, $value);
}
