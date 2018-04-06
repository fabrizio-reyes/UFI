<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "enlace".
 *
 * @property int $enl_codigo
 * @property string $enl_nombre
 * @property string $enl_direccion
 * @property int $sec_codigo
 * @property int $arc_codigo
 *
 * @property Seccion $secCodigo
 * @property Archivo $arcCodigo
 */
class Enlace extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enlace';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['enl_nombre', 'enl_direccion', 'sec_codigo', 'arc_codigo'], 'required'],
            [['sec_codigo', 'arc_codigo'], 'integer'],
            [['enl_nombre'], 'string', 'max' => 200],
            [['enl_direccion'], 'string', 'max' => 1000],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
            [['arc_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::className(), 'targetAttribute' => ['arc_codigo' => 'arc_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'enl_codigo' => 'Enl Codigo',
            'enl_nombre' => 'Enl Nombre',
            'enl_direccion' => 'Enl Direccion',
            'sec_codigo' => 'Sec Codigo',
            'arc_codigo' => 'Arc Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecCodigo()
    {
        return $this->hasOne(Seccion::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArcCodigo()
    {
        return $this->hasOne(Archivo::className(), ['arc_codigo' => 'arc_codigo']);
    }
}
