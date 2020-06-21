<?php

namespace sergeylisitsyn\settingsStorage\models;

use Yii;

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
class SettingStorage extends \yii\db\ActiveRecord
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

    /**
     * {@inheritdoc}
     * @return \sergeylisitsyn\settingsStorage\models\query\SettingStorageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \sergeylisitsyn\settingsStorage\models\query\SettingStorageQuery(get_called_class());
    }
}
