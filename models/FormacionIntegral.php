<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "formacion_integral".
 *
 * @property int $for_codigo
 * @property string $for_nombre
 * @property string $for_descripcion
 * @property string $for_carreras
 * @property string $for_codigo_asignatura
 * @property int $sec_codigo
 *
 * @property CompetenciaFormacion[] $competenciaFormacions
 * @property Seccion $secCodigo
 * @property SeccionFormacion[] $seccionFormacions
 */
class FormacionIntegral extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'formacion_integral';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['for_nombre', 'for_descripcion', 'for_carreras', 'for_codigo_asignatura', 'sec_codigo'], 'required'],
            [['sec_codigo'], 'integer'],
            [['for_nombre'], 'string', 'max' => 100],
            [['for_descripcion'], 'string', 'max' => 5000],
            [['for_carreras'], 'string', 'max' => 1000],
            [['for_codigo_asignatura'], 'string', 'max' => 30],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'for_codigo' => 'For Codigo',
            'for_nombre' => 'Nombre',
            'for_descripcion' => 'Descripción',
            'for_carreras' => 'Carreras',
            'for_codigo_asignatura' => 'Código Asignatura',
            'sec_codigo' => 'Sección',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetenciaFormacions()
    {
        return $this->hasMany(CompetenciaFormacion::className(), ['for_codigo' => 'for_codigo']);
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
    public function getSeccionFormacions()
    {
        return $this->hasMany(SeccionFormacion::className(), ['for_codigo' => 'for_codigo']);
    }
}
