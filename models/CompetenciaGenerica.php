<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competencia_generica".
 *
 * @property int $cg_codigo
 * @property string $cg_nombre
 * @property string $cg_descripcion
 *
 * @property CompetenciaDiplomado[] $competenciaDiplomados
 * @property CompetenciaFormacion[] $competenciaFormacions
 * @property CompetenciaTaller[] $competenciaTallers
 */
class CompetenciaGenerica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'competencia_generica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cg_nombre', 'cg_descripcion'], 'required'],
            [['cg_nombre'], 'string', 'max' => 100],
            [['cg_descripcion'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cg_codigo' => 'Cg Codigo',
            'cg_nombre' => 'Cg Nombre',
            'cg_descripcion' => 'Cg Descripcion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetenciaDiplomados()
    {
        return $this->hasMany(CompetenciaDiplomado::className(), ['cg_codigo' => 'cg_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetenciaFormacions()
    {
        return $this->hasMany(CompetenciaFormacion::className(), ['cg_codigo' => 'cg_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetenciaTallers()
    {
        return $this->hasMany(CompetenciaTaller::className(), ['cg_codigo' => 'cg_codigo']);
    }
}
