<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CompetenciaFormacion;

/**
 * CompetenciaFormacionSearch represents the model behind the search form of `app\models\CompetenciaFormacion`.
 */
class CompetenciaFormacionSearch extends CompetenciaFormacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['com_for_codigo', 'cg_codigo', 'for_codigo'], 'integer'],
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
        $query = CompetenciaFormacion::find();

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
            'com_for_codigo' => $this->com_for_codigo,
            'cg_codigo' => $this->cg_codigo,
            'for_codigo' => $this->for_codigo,
        ]);

        return $dataProvider;
    }
}
