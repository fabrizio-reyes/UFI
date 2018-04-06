<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormacionIntegral;

/**
 * FormacionIntegralSearch represents the model behind the search form of `app\models\FormacionIntegral`.
 */
class FormacionIntegralSearch extends FormacionIntegral
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['for_codigo', 'sec_codigo'], 'integer'],
            [['for_nombre', 'for_descripcion', 'for_carreras', 'for_codigo_asignatura'], 'safe'],
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
        $query = FormacionIntegral::find();

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
            'for_codigo' => $this->for_codigo,
            'sec_codigo' => $this->sec_codigo,
        ]);

        $query->andFilterWhere(['like', 'for_nombre', $this->for_nombre])
            ->andFilterWhere(['like', 'for_descripcion', $this->for_descripcion])
            ->andFilterWhere(['like', 'for_carreras', $this->for_carreras])
            ->andFilterWhere(['like', 'for_codigo_asignatura', $this->for_codigo_asignatura]);

        return $dataProvider;
    }
}
