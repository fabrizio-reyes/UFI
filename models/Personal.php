<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "personal".
 *
 * @property int $pers_codigo
 * @property string $pers_nombre
 * @property string $pers_cargo
 * @property string $pers_correo
 * @property string $pers_telefono
 * @property int $sec_codigo
 * @property int $arc_codigo
 *
 * @property Seccion $secCodigo
 * @property Archivo $arcCodigo
 */
class Personal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'personal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pers_nombre', 'pers_cargo', 'pers_correo', 'pers_telefono', 'sec_codigo', 'arc_codigo'], 'required'],
            [['sec_codigo', 'arc_codigo'], 'integer'],
            [['pers_nombre', 'pers_cargo'], 'string', 'max' => 100],
            [['pers_correo'], 'string', 'max' => 255],
            [['pers_telefono'], 'string', 'max' => 50],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
            [['arc_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::className(), 'targetAttribute' => ['arc_codigo' => 'arc_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pers_codigo' => 'Pers Codigo',
            'pers_nombre' => 'Nombre',
            'pers_cargo' => 'Cargo',
            'pers_correo' => 'Correo',
            'pers_telefono' => 'Teléfono',
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
