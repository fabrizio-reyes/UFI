<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_perfil".
 *
 * @property int $est_codigo
 * @property string $est_nombre
 *
 * @property UsuarioPerfil[] $usuarioPerfils
 */
class EstadoPerfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['est_nombre'], 'required'],
            [['est_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'est_codigo' => 'Est Codigo',
            'est_nombre' => 'Est Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPerfils()
    {
        return $this->hasMany(UsuarioPerfil::className(), ['est_codigo' => 'est_codigo']);
    }
}
