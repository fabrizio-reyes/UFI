<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Seccion;

/**
 * SeccionSearch represents the model behind the search form of `app\models\Seccion`.
 */
class SeccionSearch extends Seccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sec_codigo', 'sec_orden'], 'integer'],
            [['sec_nombre', 'sec_titulo', 'sec_descripcion'], 'safe'],
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
        $query = Seccion::find();

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
            'sec_codigo' => $this->sec_codigo,
            'sec_orden' => $this->sec_orden,
        ]);

        $query->andFilterWhere(['like', 'sec_nombre', $this->sec_nombre])
            ->andFilterWhere(['like', 'sec_titulo', $this->sec_titulo])
            ->andFilterWhere(['like', 'sec_descripcion', $this->sec_descripcion]);

        return $dataProvider;
    }
}
