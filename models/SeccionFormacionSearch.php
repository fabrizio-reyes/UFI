<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SeccionFormacion;

/**
 * SeccionFormacionSearch represents the model behind the search form of `app\models\SeccionFormacion`.
 */
class SeccionFormacionSearch extends SeccionFormacion
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sec_for_codigo', 'sec_for_numero', 'for_codigo'], 'integer'],
            [['sec_for_horario', 'sec_for_docente', 'sec_for_lugar'], 'safe'],
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
        $query = SeccionFormacion::find();

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
            'sec_for_codigo' => $this->sec_for_codigo,
			'sec_for_numero' => $this->sec_for_numero,
            'for_codigo' => $this->for_codigo,
        ]);

        $query->andFilterWhere(['like', 'sec_for_horario', $this->sec_for_horario])
            ->andFilterWhere(['like', 'sec_for_docente', $this->sec_for_docente])
            ->andFilterWhere(['like', 'sec_for_lugar', $this->sec_for_lugar]);

        return $dataProvider;
    }
}
