<?php
namespace sergeylisitsyn\settingsStorage;

use yii\base\Component;
use sergeylisitsyn\settingsStorage\components\SystemSettingStorageInterface;

class SystemSetting extends Component implements SystemSettingStorageInterface
{
    public $storage;
    
    public $formatters;
    
    public function init()
    {
        $this->storage = \Yii::createObject($this->storage);
    }
    
    public function create($key, $type, $value, $default=null, $description=null) : SystemSettingStorageInterface
    {
        return $this->storage::create($key, $type, $value, $default, $description);
    }
    
    public function put($key, $type, $value, $default=null, $description=null) : bool
    {
        $set = $this->storage::create($key, $type, $value, $default, $description);
        
        return $set->save();
    }
    
    public function get($key) : ?SystemSettingStorageInterface
    {
        return $this->storage->get($key);
    }
    
    public function set($key, $value)
    {
        return $this->storage->set($key, $value);
    }
    
    public function getValue($key)
    {
        $set = $this->get($key);
        $formatter = \Yii::createObject($this->formatters[($set::listTypes()[$set->type])]);
        $value = $formatter->format($set->value);
        
        return $value;
    }
    
    public function remove($key)
    {
        return $this->storage->remove($key);
    }
}
