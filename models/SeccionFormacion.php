<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seccion_formacion".
 *
 * @property int $sec_for_codigo
  * @property int $sec_for_numero
 * @property string $sec_for_horario
 * @property string $sec_for_docente
 * @property string $sec_for_lugar
 * @property int $for_codigo
 *
 * @property FormacionIntegral $forCodigo
 */
class SeccionFormacion extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seccion_formacion';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sec_for_numero', 'sec_for_horario', 'sec_for_docente', 'sec_for_lugar'], 'required'],
            [['sec_for_numero', 'for_codigo'], 'integer'],
            [['sec_for_horario', 'sec_for_docente'], 'string', 'max' => 100],
            [['sec_for_lugar'], 'string', 'max' => 1000],
            [['for_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => FormacionIntegral::className(), 'targetAttribute' => ['for_codigo' => 'for_codigo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sec_for_codigo' => 'Sec For Codigo',
            'sec_for_numero' => 'Numero de Sección',
			'sec_for_horario' => 'Horario',
            'sec_for_docente' => 'Docente',
            'sec_for_lugar' => 'Lugar',
            'for_codigo' => 'Formación Integral',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForCodigo()
    {
        return $this->hasOne(FormacionIntegral::className(), ['for_codigo' => 'for_codigo']);
    }
}
