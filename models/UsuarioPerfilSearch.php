<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioPerfil;

/**
 * UsuarioPerfilSearch represents the model behind the search form of `app\models\UsuarioPerfil`.
 */
class UsuarioPerfilSearch extends UsuarioPerfil
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['usu_per_codigo', 'id', 'per_codigo', 'est_codigo'], 'integer'],
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
        $query = UsuarioPerfil::find();

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
            'usu_per_codigo' => $this->usu_per_codigo,
            'id' => $this->id,
            'per_codigo' => $this->per_codigo,
            'est_codigo' => $this->est_codigo,
        ]);

        return $dataProvider;
    }
}
