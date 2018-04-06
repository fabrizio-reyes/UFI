<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Diplomado;

/**
 * DiplomadoSearch represents the model behind the search form of `app\models\Diplomado`.
 */
class DiplomadoSearch extends Diplomado
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dip_codigo', 'sec_codigo'], 'integer'],
            [['dip_nombre', 'dip_descripcion', 'dip_objetivo_general', 'dip_objetivos_especificos', 'dip_orientado', 'dip_horario', 'dip_contacto'], 'safe'],
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
        $query = Diplomado::find();

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
            'dip_codigo' => $this->dip_codigo,
            'sec_codigo' => $this->sec_codigo,
        ]);

        $query->andFilterWhere(['like', 'dip_nombre', $this->dip_nombre])
            ->andFilterWhere(['like', 'dip_descripcion', $this->dip_descripcion])
            ->andFilterWhere(['like', 'dip_objetivo_general', $this->dip_objetivo_general])
            ->andFilterWhere(['like', 'dip_objetivos_especificos', $this->dip_objetivos_especificos])
            ->andFilterWhere(['like', 'dip_orientado', $this->dip_orientado])
            ->andFilterWhere(['like', 'dip_horario', $this->dip_horario])
            ->andFilterWhere(['like', 'dip_contacto', $this->dip_contacto]);

        return $dataProvider;
    }
}
