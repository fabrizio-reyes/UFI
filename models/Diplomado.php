<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diplomado".
 *
 * @property int $dip_codigo
 * @property string $dip_nombre
 * @property string $dip_descripcion
 * @property string $dip_objetivo_general
 * @property string $dip_objetivos_especificos
 * @property string $dip_orientado
 * @property string $dip_horario
 * @property string $dip_contacto
 * @property int $sec_codigo
 *
 * @property CompetenciaDiplomado[] $competenciaDiplomados
 * @property Seccion $secCodigo
 * @property DiplomadoArchivo[] $diplomadoArchivos
 */
class Diplomado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diplomado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dip_nombre', 'dip_descripcion', 'dip_objetivo_general', 'dip_objetivos_especificos', 'dip_orientado', 'dip_horario', 'dip_contacto', 'sec_codigo'], 'required'],
            [['sec_codigo'], 'integer'],
            [['dip_nombre'], 'string', 'max' => 50],
            [['dip_descripcion', 'dip_objetivos_especificos'], 'string', 'max' => 5000],
            [['dip_objetivo_general'], 'string', 'max' => 500],
            [['dip_orientado'], 'string', 'max' => 1000],
            [['dip_horario'], 'string', 'max' => 300],
            [['dip_contacto'], 'string', 'max' => 200],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dip_codigo' => 'Dip Codigo',
            'dip_nombre' => 'Nombre',
            'dip_descripcion' => 'Descripción',
            'dip_objetivo_general' => 'Objetivo General',
            'dip_objetivos_especificos' => 'Objetivos Especificos',
            'dip_orientado' => 'Orientado',
            'dip_horario' => 'Horario',
            'dip_contacto' => 'Contacto',
            'sec_codigo' => 'Sección',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetenciaDiplomados()
    {
        return $this->hasMany(CompetenciaDiplomado::className(), ['dip_codigo' => 'dip_codigo']);
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
    public function getDiplomadoArchivos()
    {
        return $this->hasMany(DiplomadoArchivo::className(), ['dip_codigo' => 'dip_codigo']);
    }
}
