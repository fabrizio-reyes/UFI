<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competencia_formacion".
 *
 * @property int $com_for_codigo
 * @property int $cg_codigo
 * @property int $for_codigo
 *
 * @property FormacionIntegral $forCodigo
 * @property CompetenciaGenerica $cgCodigo
 */
class CompetenciaFormacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competencia_formacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cg_codigo', 'for_codigo'], 'required'],
            [['cg_codigo', 'for_codigo'], 'integer'],
            [['for_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => FormacionIntegral::className(), 'targetAttribute' => ['for_codigo' => 'for_codigo']],
            [['cg_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => CompetenciaGenerica::className(), 'targetAttribute' => ['cg_codigo' => 'cg_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'com_for_codigo' => 'Com For Codigo',
            'cg_codigo' => 'Cg Codigo',
            'for_codigo' => 'For Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getForCodigo()
    {
        return $this->hasOne(FormacionIntegral::className(), ['for_codigo' => 'for_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCgCodigo()
    {
        return $this->hasOne(CompetenciaGenerica::className(), ['cg_codigo' => 'cg_codigo']);
    }
}
