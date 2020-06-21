<?php
namespace sergeylisitsyn\settingsStorage\components;

interface SystemSettingStorageInterface
{
    public function create();
    
    public function get();
    
    public function set();
}
