<?php
namespace sergeylisitsyn\settingsStorage;

use yii\base\Component;
use sergeylisitsyn\settingsStorage\components\SystemSettingStorageInterface;

class SystemSetting extends Component implements SystemSettingStorageInterface
{
    public $storage;
    
    public $formatter;
    
    public function init()
    {
        $this->storage = \Yii::createObject($this->storage);
        $this->formatter = \Yii::createObject($this->formatter['class']);
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
    
    public function set($key, $value) : void
    {
        return $this->storage->set($key, $value);
    }
    
    public function getValue($key)
    {
        // echo '<b>'.__FILE__.' -- '.__LINE__.'</b><pre>'; var_dump($this->formatter); echo '</pre>'; die();
        $set = $this->formatter->format($this->get($key));
        
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
    
    public function remove($key)
    {
        return $this->storage->delete($key);
    }
}
