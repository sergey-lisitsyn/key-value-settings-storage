<?php

namespace sergeylisitsyn\settingsStorage\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use sergeylisitsyn\settingsStorage\models\SettingStorage;

/**
 * SettingStorageSearch represents the model behind the search form of `sergeylisitsyn\settingsStorage\models\SettingStorage`.
 */
class SettingStorageSearch extends SettingStorage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type'], 'integer'],
            [['name', 'value', 'default', 'description'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = SettingStorage::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'type' => $this->type,
        ]);

        $query->andFilterWhere(['ilike', 'name', $this->name])
            ->andFilterWhere(['ilike', 'value', $this->value])
            ->andFilterWhere(['ilike', 'default', $this->default])
            ->andFilterWhere(['ilike', 'description', $this->description]);

        return $dataProvider;
    }
}
