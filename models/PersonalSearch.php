<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Personal;

/**
 * PersonalSearch represents the model behind the search form of `app\models\Personal`.
 */
class PersonalSearch extends Personal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pers_codigo', 'sec_codigo', 'arc_codigo'], 'integer'],
            [['pers_nombre', 'pers_cargo', 'pers_correo', 'pers_telefono'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Personal::find();

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
            'pers_codigo' => $this->pers_codigo,
            'sec_codigo' => $this->sec_codigo,
            'arc_codigo' => $this->arc_codigo,
        ]);

        $query->andFilterWhere(['like', 'pers_nombre', $this->pers_nombre])
            ->andFilterWhere(['like', 'pers_cargo', $this->pers_cargo])
            ->andFilterWhere(['like', 'pers_correo', $this->pers_correo])
            ->andFilterWhere(['like', 'pers_telefono', $this->pers_telefono]);

        return $dataProvider;
    }
}
