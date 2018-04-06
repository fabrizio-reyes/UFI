<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "linea_archivo".
 *
 * @property int $lin_arc_codigo
 * @property int $lin_codigo
 * @property int $arc_codigo
 * @property int $tip_arc_codigo
 *
 * @property Linea $linCodigo
 * @property TipoArchivo $tipArcCodigo
 * @property Archivo $arcCodigo
 */
class LineaArchivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'linea_archivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['lin_codigo', 'arc_codigo', 'tip_arc_codigo'], 'required'],
            [['lin_codigo', 'arc_codigo', 'tip_arc_codigo'], 'integer'],
            [['lin_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Linea::className(), 'targetAttribute' => ['lin_codigo' => 'lin_codigo']],
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
            'lin_arc_codigo' => 'Lin Arc Codigo',
            'lin_codigo' => 'Lin Codigo',
            'arc_codigo' => 'Arc Codigo',
            'tip_arc_codigo' => 'Tip Arc Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinCodigo()
    {
        return $this->hasOne(Linea::className(), ['lin_codigo' => 'lin_codigo']);
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
