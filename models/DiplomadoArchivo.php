<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diplomado_archivo".
 *
 * @property int $dip_arc_codigo
 * @property int $dip_codigo
 * @property int $arc_codigo
 * @property int $tip_arc_codigo
 *
 * @property Diplomado $dipCodigo
 * @property TipoArchivo $tipArcCodigo
 * @property Archivo $arcCodigo
 */
class DiplomadoArchivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diplomado_archivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dip_codigo', 'arc_codigo', 'tip_arc_codigo'], 'required'],
            [['dip_codigo', 'arc_codigo', 'tip_arc_codigo'], 'integer'],
            [['dip_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Diplomado::className(), 'targetAttribute' => ['dip_codigo' => 'dip_codigo']],
            [['tip_arc_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoArchivo::className(), 'targetAttribute' => ['tip_arc_codigo' => 'tip_arc_codigo']],
            [['arc_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::className(), 'targetAttribute' => ['arc_codigo' => 'arc_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'dip_arc_codigo' => 'Dip Arc Codigo',
            'dip_codigo' => 'Dip Codigo',
            'arc_codigo' => 'Arc Codigo',
            'tip_arc_codigo' => 'Tip Arc Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDipCodigo()
    {
        return $this->hasOne(Diplomado::className(), ['dip_codigo' => 'dip_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipArcCodigo()
    {
        return $this->hasOne(TipoArchivo::className(), ['tip_arc_codigo' => 'tip_arc_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArcCodigo()
    {
        return $this->hasOne(Archivo::className(), ['arc_codigo' => 'arc_codigo']);
    }
}
