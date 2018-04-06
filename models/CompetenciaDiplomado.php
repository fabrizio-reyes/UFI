<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competencia_diplomado".
 *
 * @property int $com_dip_codigo
 * @property int $cg_codigo
 * @property int $dip_codigo
 *
 * @property Diplomado $dipCodigo
 * @property CompetenciaGenerica $cgCodigo
 */
class CompetenciaDiplomado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competencia_diplomado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cg_codigo', 'dip_codigo'], 'required'],
            [['cg_codigo', 'dip_codigo'], 'integer'],
            [['dip_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Diplomado::className(), 'targetAttribute' => ['dip_codigo' => 'dip_codigo']],
            [['cg_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => CompetenciaGenerica::className(), 'targetAttribute' => ['cg_codigo' => 'cg_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'com_dip_codigo' => 'Com Dip Codigo',
            'cg_codigo' => 'Cg Codigo',
            'dip_codigo' => 'Dip Codigo',
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
    public function getCgCodigo()
    {
        return $this->hasOne(CompetenciaGenerica::className(), ['cg_codigo' => 'cg_codigo']);
    }
}
