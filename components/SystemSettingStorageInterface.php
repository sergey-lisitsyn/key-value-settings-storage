<?php
namespace sergeylisitsyn\settingsStorage\components;

interface SystemSettingStorageInterface
{
    public function create($key, $type, $default=null, $description=null);
    
    public function get($key);
    
    public function set($key, $value);
}
