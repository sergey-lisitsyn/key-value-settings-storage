<?php

namespace sergeylisitsyn\settingsStorage\models\query;

/**
 * This is the ActiveQuery class for [[\sergeylisitsyn\settingsStorage\models\SettingStorage]].
 *
 * @see \sergeylisitsyn\settingsStorage\models\SettingStorage
 */
class SettingStorageQuery extends \yii\db\ActiveQuery
{
    /**
     * {@inheritdoc}
     * @return \sergeylisitsyn\settingsStorage\models\SettingStorage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \sergeylisitsyn\settingsStorage\models\SettingStorage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function byName($name)
    {
        return $this->andWhere(['name' => $name]);
    }
}
