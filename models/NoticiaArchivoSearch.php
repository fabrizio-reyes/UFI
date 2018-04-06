<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NoticiaArchivo;

/**
 * NoticiaArchivoSearch represents the model behind the search form of `app\models\NoticiaArchivo`.
 */
class NoticiaArchivoSearch extends NoticiaArchivo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['not_arc_codigo', 'not_codigo', 'arc_codigo'], 'integer'],
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
        $query = NoticiaArchivo::find();

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
            'not_arc_codigo' => $this->not_arc_codigo,
            'not_codigo' => $this->not_codigo,
            'arc_codigo' => $this->arc_codigo,
        ]);

        return $dataProvider;
    }
}
