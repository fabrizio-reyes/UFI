<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Taller;

/**
 * TallerSearch represents the model behind the search form of `app\models\Taller`.
 */
class TallerSearch extends Taller
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tal_codigo', 'lin_codigo'], 'integer'],
            [['tal_nombre', 'tal_sede', 'tal_fecha', 'tal_docente', 'tal_objetivos'], 'safe'],
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
        $query = Taller::find();

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
            'tal_codigo' => $this->tal_codigo,
            'tal_fecha' => $this->tal_fecha,
            'lin_codigo' => $this->lin_codigo,
        ]);

        $query->andFilterWhere(['like', 'tal_nombre', $this->tal_nombre])
            ->andFilterWhere(['like', 'tal_sede', $this->tal_sede])
            ->andFilterWhere(['like', 'tal_docente', $this->tal_docente])
            ->andFilterWhere(['like', 'tal_objetivos', $this->tal_objetivos]);

        return $dataProvider;
    }
}
