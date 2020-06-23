<?php
namespace sergeylisitsyn\settingsStorage;

use sergeylisitsyn\settingsStorage\components\SystemSettingStorageInterface;
use yii\base\Component;
use sergeylisitsyn\settingsStorage\components\SettingTypeFormatterInterface;

class SystemSetting extends Component implements SystemSettingStorageInterface
{
    private $_storage;
    
    private $_formatter;
    
    public function __construct(
        SystemSettingStorageInterface $storage, 
        SettingTypeFormatterInterface $formatter
    ) : void
    {
        $this->_storage = $storage;
        $this->_formatter = $storage;
    }
    
    public static function create($key, $type, $value, $default=null, $description=null) : SystemSettingStorageInterface
    {
        return $this->_storage::create($key, $type, $value, $default, $description);
    }
    
    public function get($key) : ?SystemSettingStorageInterface
    {
        return $this->_storage->get($key);
    }
    
    public function set($key, $value) : void
    {
        $this->_storage->set($key, $value);
    }
    
    public static function getValue($key)
    {
        $set = $this->_formatter->format($this->get($key));
        
//         if ($set->type == static::TYPE_STRING) {
//             return $set->value ? $set->value : $set->default;
//         } elseif ($set->type == static::TYPE_NUMBER) {
//             return $set->value ? $set->value : $set->default;
//         } elseif ($set->type == static::TYPE_BOOLEAN) {
//             return (int) $set->value ? true : false;
//         } elseif ($set->type == static::TYPE_ARRAY) {
//             return unserialize($set->value);
//         } else {
//             return null;
//         }
    }
}
