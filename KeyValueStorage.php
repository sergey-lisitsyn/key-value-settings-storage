<?php
namespace sergeylisitsyn\settingsStorage;

use Yii;
use yii\base\Component;
use sergeylisitsyn\settingsStorage\components\KeyValueStorageInterface;
use yii\helpers\ArrayHelper;
use sergeylisitsyn\settingsStorage\components\ValueTypeFormatterInterface;
use sergeylisitsyn\settingsStorage\models\formatters\DefaultStorageFormatter;

class KeyValueStorage extends Component implements KeyValueStorageInterface
{
    public $storage;
    
    public $formatters;
    
    private $formatter;
    
    /**
     * @var array Runtime values cache
     */
    private $values = [];
    
    public function init()
    {
        parent::init();
        
        $this->storage = Yii::createObject($this->storage);
        $this->setFormatter(Yii::createObject(DefaultStorageFormatter::class));
        
        $items = $this->storage::find()->all();
        foreach ($items as $item) {
            if ($item->name)
                $this->values[$item->name] = ($item->value === '' || $item->value === null) ?
                $item->default : $item->value;
        }
    }
    
    public function setFormatter(ValueTypeFormatterInterface $formatter): void
    {
        $this->formatter = $formatter;
    }
    
    public function getFormatter(): ValueTypeFormatterInterface
    {
        return $this->formatter;
    }
    
    public function create(
        string $key,
        int $type,
        ?string $value,
        ?string $default,
        ?string $description
    ): ?KeyValueStorageInterface
    {
        return $this->storage::create($key, $type, $value, $default, $description);
    }
    
    public function put(
        string $key,
        int $type,
        ?string $value,
        ?string $default = null,
        ?string $description = null
    ): bool
    {
        $item = $this->create($key, $type, $value, $default, $description);
        
        if ($item->save(false)) {
            $this->values[$key] = $value;
            return true;
        };
        return false;
    }
    
    public function update(
        string $key,
        int $type,
        ?string $value,
        ?string $default = null,
        ?string $description = null
    ): bool
    {
        $item = $this->get($key);
        
        if ($item) {
            $item->edit($key, $type, $value, $default, $description);
            
            if ($item->update(false)) {
                $this->values[$key] = $value;
                return true;
            };
        }
        return false;
    }
    
    public function createOrUpdate(
        string $key,
        int $type,
        ?string $value,
        ?string $default,
        ?string $description
    ): bool
    {
        if ($this->isset($key)) {
            return $this->update($key, $type, $value, $default, $description);
        } else {
            return $this->put($key, $type, $value, $default, $description);
        }
    }
    
    public function get($key): ?KeyValueStorageInterface
    {
        return $this->storage->get($key);
    }
    
    public function setAll(array $values): void
    {
        foreach ($values as $key => $value) {
            $this->set($key, $value);
        }
    }
    
    public function set($key, $value): bool
    {
        if ($this->storage->set($key, $value)) {
            $this->values[$key] = $value;
            
            return true;
        }
        
        return false;
    }
    
    public function isset($key): bool
    {
        return $this->storage->get($key) !== null;
    }
    
    public function setType($key, $type): bool
    {
        return $this->storage->setType($key, $type);
    }
    
    /**
     * @return mixed
     */
    public function getValue($key, $default = null)
    {
        $value = ArrayHelper::getValue($this->values, $key, false);
        $this->setFormatter(Yii::createObject(DefaultStorageFormatter::class));
        
        if ($value === false) {
            if (($item = $this->get($key)) !== null) {
                $formatterType = $this->formatters[($item::listTypes()[$item->type])];
                $this->setFormatter(Yii::createObject($formatterType));
                if ($default === null) {
                    $default = $item->default ?? null;
                }
                $value = $item->value ?? $default;
                $this->values[$key] = $value;
            }
        }
        
        return $this->formatter->format($value);
    }
    
    public function removeAll(array $keys): void
    {
        foreach ($keys as $key) {
            $this->remove($key);
        }
    }
    
    public function remove($key): bool
    {
        return $this->storage->remove($key);
    }

    /**
     * @param $value
     * @param $type
     * @return mixed
     */
    public function validate($value, $type)
    {
        $valid = false;

        switch ($type) {
            case KeyValueStorageInterface::TYPE_STRING :
                $valid = is_string($value);
                break;
            case KeyValueStorageInterface::TYPE_NUMBER :
                $valid = is_numeric($value);
                break;
            case KeyValueStorageInterface::TYPE_ARRAY :
                $valid = is_array($value);
                break;
        }

        return $valid ? $value : false;
    }
}
