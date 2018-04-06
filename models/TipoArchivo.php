<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_archivo".
 *
 * @property int $tip_arc_codigo
 * @property string $tip_arc_nombre
 *
 * @property DiplomadoArchivo[] $diplomadoArchivos
 * @property LineaArchivo[] $lineaArchivos
 */
class TipoArchivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_archivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tip_arc_nombre'], 'required'],
            [['tip_arc_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tip_arc_codigo' => 'Tip Arc Codigo',
            'tip_arc_nombre' => 'Tip Arc Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiplomadoArchivos()
    {
        return $this->hasMany(DiplomadoArchivo::className(), ['tip_arc_codigo' => 'tip_arc_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaArchivos()
    {
        return $this->hasMany(LineaArchivo::className(), ['tip_arc_codigo' => 'tip_arc_codigo']);
    }
}
