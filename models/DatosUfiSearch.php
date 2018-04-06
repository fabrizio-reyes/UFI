<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DatosUfi;

/**
 * DatosUfiSearch represents the model behind the search form of `app\models\DatosUfi`.
 */
class DatosUfiSearch extends DatosUfi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dat_codigo', 'sec_codigo'], 'integer'],
            [['dat_nombre', 'dat_titulo', 'dat_descripcion'], 'safe'],
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
        $query = DatosUfi::find();

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
            'dat_codigo' => $this->dat_codigo,
            'sec_codigo' => $this->sec_codigo,
        ]);

        $query->andFilterWhere(['like', 'dat_nombre', $this->dat_nombre])
            ->andFilterWhere(['like', 'dat_titulo', $this->dat_titulo])
            ->andFilterWhere(['like', 'dat_descripcion', $this->dat_descripcion]);

        return $dataProvider;
    }
}
