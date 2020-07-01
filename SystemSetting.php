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
    
    public function create(
        string $key,
        int $type,
        ?string $value,
        ?string $default,
        ?string $description
    ) : ?SystemSettingStorageInterface
    {
            return $this->storage::create($key, $type, $value, $default, $description);
    }
    
    public function edit(
        string $key,
        int $type,
        ?string $value,
        ?string $default,
        ?string $description
    ) : void
    {
        $this->storage->edit($key, $type, $value, $default, $description);
    }
    
    public function put(
        string $key,
        int $type,
        ?string $value,
        ?string $default = null,
        ?string $description = null
    ) : bool
    {
        $set = $this->storage::create($key, $type, $value, $default, $description);
        
        return (bool) $set->save();
    }
    
    public function createOrUpdate(
        string $key,
        int $type,
        ?string $value,
        ?string $default,
        ?string $description
    ) : bool
    {
        if ($this->isset($key)) {
            $set = $this->storage->get($key);
            $set->edit($key, $type, $value, $default, $description);
            return (bool) $set->update();
        } else {
            return $this->put($key, $type, $value, $default, $description);
        }
    }
    
    public function get($key) : ?SystemSettingStorageInterface
    {
        return $this->storage->get($key);
    }
    
    public function set($key, $value) : bool
    {
        return $this->storage->set($key, $value);
    }
    
    public function isset($key) : bool
    {
        if ($this->storage->get($key)) {
            return true;
        } else {
            return false;
        }
    }
    
    public function setType($key, $type) : bool
    {
        return $this->storage->setType($key, $type);
    }
    
    /**
     * @return mixed
     */
    public function getValue($key)
    {
        $set = $this->get($key);
        $formatter = \Yii::createObject($this->formatters[($set::listTypes()[$set->type])]);
        $value = $formatter->format($set->value);
        
        return $value;
    }
    
    public function remove($key) : bool
    {
        return $this->storage->remove($key);
    }
}
