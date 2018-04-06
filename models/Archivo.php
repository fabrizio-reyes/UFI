<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "archivo".
 *
 * @property int $arc_codigo
 * @property string $arc_nombre
 * @property string $arc_direccion
 * @property string $arc_extension
 * @property int $tip_codigo
 *
 * @property Tipo $tipCodigo
 * @property DiplomadoArchivo[] $diplomadoArchivos
 * @property Enlace[] $enlaces
 * @property LineaArchivo[] $lineaArchivos
 * @property NoticiaArchivo[] $noticiaArchivos
 * @property Personal[] $personals
 */
class Archivo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'archivo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['arc_nombre', 'arc_direccion', 'arc_extension', 'tip_codigo'], 'required'],
            [['tip_codigo'], 'integer'],
            [['arc_nombre'], 'string', 'max' => 200],
            [['arc_direccion'], 'string', 'max' => 1000],
            [['arc_extension'], 'string', 'max' => 50],
            [['tip_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Tipo::className(), 'targetAttribute' => ['tip_codigo' => 'tip_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'arc_codigo' => 'Arc Codigo',
            'arc_nombre' => 'Arc Nombre',
            'arc_direccion' => 'Arc Direccion',
            'arc_extension' => 'Arc Extension',
            'tip_codigo' => 'Tip Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipCodigo()
    {
        return $this->hasOne(Tipo::className(), ['tip_codigo' => 'tip_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiplomadoArchivos()
    {
        return $this->hasMany(DiplomadoArchivo::className(), ['arc_codigo' => 'arc_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaces()
    {
        return $this->hasMany(Enlace::className(), ['arc_codigo' => 'arc_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaArchivos()
    {
        return $this->hasMany(LineaArchivo::className(), ['arc_codigo' => 'arc_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticiaArchivos()
    {
        return $this->hasMany(NoticiaArchivo::className(), ['arc_codigo' => 'arc_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['arc_codigo' => 'arc_codigo']);
    }
}
