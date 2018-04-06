<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstadoLinea;

/**
 * EstadoLineaSearch represents the model behind the search form of `app\models\EstadoLinea`.
 */
class EstadoLineaSearch extends EstadoLinea
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_lin_codigo'], 'integer'],
            [['est_lin_nombre'], 'safe'],
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
        $query = EstadoLinea::find();

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
            'est_lin_codigo' => $this->est_lin_codigo,
        ]);

        $query->andFilterWhere(['like', 'est_lin_nombre', $this->est_lin_nombre]);

        return $dataProvider;
    }
}
