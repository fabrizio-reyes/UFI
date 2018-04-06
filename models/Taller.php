<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "taller".
 *
 * @property int $tal_codigo
 * @property string $tal_nombre
 * @property string $tal_sede
 * @property string $tal_fecha
 * @property string $tal_docente
 * @property string $tal_objetivos
 * @property int $lin_codigo
 *
 * @property CompetenciaTaller[] $competenciaTallers
 * @property Linea $linCodigo
 */
class Taller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'taller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tal_nombre', 'tal_sede', 'tal_fecha', 'tal_docente', 'tal_objetivos'], 'required'],
            [['tal_fecha'], 'safe'],
            [['lin_codigo'], 'integer'],
            [['tal_nombre'], 'string', 'max' => 100],
            [['tal_sede'], 'string', 'max' => 20],
            [['tal_docente'], 'string', 'max' => 50],
            [['tal_objetivos'], 'string', 'max' => 1000],
            [['lin_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Linea::className(), 'targetAttribute' => ['lin_codigo' => 'lin_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tal_codigo' => 'Codigo',
            'tal_nombre' => 'Nombre',
            'tal_sede' => 'Sede',
            'tal_fecha' => 'Fecha',
            'tal_docente' => 'Docente',
            'tal_objetivos' => 'Objetivos',
            'lin_codigo' => 'Linea',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetenciaTallers()
    {
        return $this->hasMany(CompetenciaTaller::className(), ['tal_codigo' => 'tal_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLinCodigo()
    {
        return $this->hasOne(Linea::className(), ['lin_codigo' => 'lin_codigo']);
    }
}
