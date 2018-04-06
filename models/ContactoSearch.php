<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contacto;

/**
 * ContactoSearch represents the model behind the search form of `app\models\Contacto`.
 */
class ContactoSearch extends Contacto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_codigo', 'sec_codigo'], 'integer'],
            [['con_nombre', 'con_correo', 'con_mensaje'], 'safe'],
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
        $query = Contacto::find();

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
            'con_codigo' => $this->con_codigo,
            'sec_codigo' => $this->sec_codigo,
        ]);

        $query->andFilterWhere(['like', 'con_nombre', $this->con_nombre])
            ->andFilterWhere(['like', 'con_correo', $this->con_correo])
            ->andFilterWhere(['like', 'con_mensaje', $this->con_mensaje]);

        return $dataProvider;
    }
}
