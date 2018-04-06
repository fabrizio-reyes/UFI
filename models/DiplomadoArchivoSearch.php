<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DiplomadoArchivo;

/**
 * DiplomadoArchivoSearch represents the model behind the search form of `app\models\DiplomadoArchivo`.
 */
class DiplomadoArchivoSearch extends DiplomadoArchivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dip_arc_codigo', 'dip_codigo', 'arc_codigo', 'tip_arc_codigo'], 'integer'],
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
        $query = DiplomadoArchivo::find();

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
            'dip_arc_codigo' => $this->dip_arc_codigo,
            'dip_codigo' => $this->dip_codigo,
            'arc_codigo' => $this->arc_codigo,
            'tip_arc_codigo' => $this->tip_arc_codigo,
        ]);

        return $dataProvider;
    }
}
