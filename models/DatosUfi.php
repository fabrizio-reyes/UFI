<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "datos_ufi".
 *
 * @property int $dat_codigo
 * @property string $dat_nombre
 * @property string $dat_titulo
 * @property string $dat_descripcion
 * @property int $sec_codigo
 *
 * @property Seccion $secCodigo
 * @property Enlace[] $enlaces
 */
class DatosUfi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'datos_ufi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dat_nombre', 'dat_titulo', 'dat_descripcion', 'sec_codigo'], 'required'],
            [['sec_codigo'], 'integer'],
            [['dat_nombre', 'dat_titulo'], 'string', 'max' => 100],
            [['dat_descripcion'], 'string', 'max' => 10000],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dat_codigo' => 'Dat Codigo',
            'dat_nombre' => 'Nombre',
            'dat_titulo' => 'Título',
            'dat_descripcion' => 'Descripción',
            'sec_codigo' => 'Sección',
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
    public function getEnlaces()
    {
        return $this->hasMany(Enlace::className(), ['dat_codigo' => 'dat_codigo']);
    }
}
