<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perfil".
 *
 * @property int $per_codigo
 * @property string $per_nombre
 *
 * @property UsuarioPerfil[] $usuarioPerfils
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['per_nombre'], 'required'],
            [['per_nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'per_codigo' => 'Per Codigo',
            'per_nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPerfils()
    {
        return $this->hasMany(UsuarioPerfil::className(), ['per_codigo' => 'per_codigo']);
    }
}
