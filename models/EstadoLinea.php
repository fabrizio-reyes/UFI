<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_linea".
 *
 * @property int $est_lin_codigo
 * @property string $est_lin_nombre
 *
 * @property Linea[] $lineas
 */
class EstadoLinea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estado_linea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['est_lin_nombre'], 'required'],
            [['est_lin_nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_lin_codigo' => 'Est Lin Codigo',
            'est_lin_nombre' => 'Est Lin Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineas()
    {
        return $this->hasMany(Linea::className(), ['est_lin_codigo' => 'est_lin_codigo']);
    }
}
