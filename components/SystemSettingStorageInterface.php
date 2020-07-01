<?php
namespace sergeylisitsyn\settingsStorage\components;

interface SystemSettingStorageInterface
{
    const TYPE_STRING = 0;
    
    const TYPE_NUMBER = 1;
    
    const TYPE_BOOLEAN = 2;
    
    const TYPE_ARRAY = 3;
    
    const TYPE_STRING_NAME = 'string';
    
    const TYPE_NUMBER_NAME = 'number';
    
    const TYPE_BOOLEAN_NAME = 'boolean';
    
    const TYPE_ARRAY_NAME = 'array';
    
    public function edit(string $key, int $type, ?string $value, ?string $default, ?string $description);
    
    public function get($key);
    
    public function set($key, $value);
    
    public function remove($key);
}
