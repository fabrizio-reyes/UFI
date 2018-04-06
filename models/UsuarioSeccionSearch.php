<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioSeccion;

/**
 * UsuarioSeccionSearch represents the model behind the search form of `app\models\UsuarioSeccion`.
 */
class UsuarioSeccionSearch extends UsuarioSeccion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usu_sec_codigo', 'id', 'sec_codigo'], 'integer'],
            [['usu_sec_fecha'], 'safe'],
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
        $query = UsuarioSeccion::find();

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
            'usu_sec_codigo' => $this->usu_sec_codigo,
            'id' => $this->id,
            'sec_codigo' => $this->sec_codigo,
            'usu_sec_fecha' => $this->usu_sec_fecha,
        ]);

        return $dataProvider;
    }
}
