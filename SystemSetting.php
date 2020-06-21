<?php
namespace sergeylisitsyn\settingsStorage;

use sergeylisitsyn\settingsStorage\components\SystemSettingStorageInterface;
use yii\base\Component;

class SystemSetting extends Component implements SystemSettingStorageInterface
{
    private $storage;
    
    public function __construct(SystemSettingStorageInterface $storage) : void
    {
        $this->storage = $storage;
    }
    
    public static function create($key, $type, $default=null, $description=null) : SystemSettingStorageInterface
    {
        return $this->storage::create($key, $type, $default, $description);
    }
    
    public function get($key) : SystemSettingStorageInterface
    {
        return $this->storage->get($key);
    }
    
    public function set($key, $value) : void
    {
        $this->storage->set($key, $value);
    }
}
