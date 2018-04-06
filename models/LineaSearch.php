<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Linea;

/**
 * LineaSearch represents the model behind the search form of `app\models\Linea`.
 */
class LineaSearch extends Linea
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lin_codigo', 'est_lin_codigo', 'cg_codigo', 'sec_codigo'], 'integer'],
            [['lin_nombre', 'lin_descripcion'], 'safe'],
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
        $query = Linea::find();

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
            'lin_codigo' => $this->lin_codigo,
            'est_lin_codigo' => $this->est_lin_codigo,
            'cg_codigo' => $this->cg_codigo,
            'sec_codigo' => $this->sec_codigo,
        ]);

        $query->andFilterWhere(['like', 'lin_nombre', $this->lin_nombre])
            ->andFilterWhere(['like', 'lin_descripcion', $this->lin_descripcion]);

        return $dataProvider;
    }
}
