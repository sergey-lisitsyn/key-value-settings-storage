<?php

namespace sergeylisitsyn\settingsStorage\models;

use Yii;
use sergeylisitsyn\settingsStorage\components\SystemSettingStorageInterface;

/**
 * This is the model class for table "setting_storage".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $value
 * @property string $default
 * @property string $description
 */
class SettingStorage extends \yii\db\ActiveRecord implements SystemSettingStorageInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting_storage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type'], 'default', 'value' => null],
            [['type'], 'integer'],
            [['description'], 'string'],
            [['name', 'value', 'default'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'value' => 'Value',
            'default' => 'Default',
            'description' => 'Description',
        ];
    }

    public static function create(
        string $key,
        int $type,
        ?string $value = null,
        ?string $default = null,
        ?string $description = null
    ) : self
    {
        $setting = new self;
        $setting->name = $key;
        $setting->type = $type;
        $setting->default = $default;
        $setting->description = $description;
        
        return $setting;
    }

    public function get($key) : ?self
    {
        return self::find()->byName($key)->one();
    }

    public function set($key, $value)
    {
        $setting = self::find()->byName($key)->one();
        $setting->value = $value;
        
        return $setting->update();
    }
    
    public function delete($key)
    {
        $setting = self::find()->byName($key)->one();
        
        return $setting->delete();
    }
    
    public static function listTypes()
    {
        return [
            static::TYPE_STRING => static::TYPE_STRING_NAME,
            static::TYPE_NUMBER => static::TYPE_NUMBER_NAME,
            static::TYPE_BOOLEAN => static::TYPE_BOOLEAN_NAME,
            static::TYPE_ARRAY => static::TYPE_ARRAY_NAME
        ];
    }

    /**
     * {@inheritdoc}
     * @return \sergeylisitsyn\settingsStorage\models\query\SettingStorageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \sergeylisitsyn\settingsStorage\models\query\SettingStorageQuery(get_called_class());
    }
}
