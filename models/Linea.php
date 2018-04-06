<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linea".
 *
 * @property int $lin_codigo
 * @property string $lin_nombre
 * @property string $lin_descripcion
 * @property int $est_lin_codigo
 * @property int $cg_codigo
 * @property int $sec_codigo
 *
 * @property Seccion $secCodigo
 * @property EstadoLinea $estLinCodigo
 * @property LineaArchivo[] $lineaArchivos
 * @property Taller[] $tallers
 */
class Linea extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'linea';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lin_nombre', 'lin_descripcion', 'est_lin_codigo', 'cg_codigo', 'sec_codigo'], 'required'],
            [['est_lin_codigo', 'cg_codigo', 'sec_codigo'], 'integer'],
            [['lin_nombre'], 'string', 'max' => 100],
            [['lin_descripcion'], 'string', 'max' => 500],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
            [['est_lin_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoLinea::className(), 'targetAttribute' => ['est_lin_codigo' => 'est_lin_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'lin_codigo' => 'Lin Codigo',
            'lin_nombre' => 'Nombre',
            'lin_descripcion' => 'Descripcion',
            'est_lin_codigo' => 'Estado',
            'cg_codigo' => 'Competencia Genérica',
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
    public function getEstLinCodigo()
    {
        return $this->hasOne(EstadoLinea::className(), ['est_lin_codigo' => 'est_lin_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaArchivos()
    {
        return $this->hasMany(LineaArchivo::className(), ['lin_codigo' => 'lin_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTallers()
    {
        return $this->hasMany(Taller::className(), ['lin_codigo' => 'lin_codigo']);
    }
}
