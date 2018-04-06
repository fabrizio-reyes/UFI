<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_perfil".
 *
 * @property int $usu_per_codigo
 * @property int $id
 * @property int $per_codigo
 * @property int $est_codigo
 *
 * @property Usuario $id0
 * @property Perfil $perCodigo
 * @property EstadoPerfil $estCodigo
 */
class UsuarioPerfil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_perfil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'per_codigo', 'est_codigo'], 'required'],
            [['id', 'per_codigo', 'est_codigo'], 'integer'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id' => 'id']],
            [['per_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['per_codigo' => 'per_codigo']],
            [['est_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoPerfil::className(), 'targetAttribute' => ['est_codigo' => 'est_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usu_per_codigo' => 'Usu Per Codigo',
            'id' => 'ID',
            'per_codigo' => 'Per Codigo',
            'est_codigo' => 'Est Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Usuario::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerCodigo()
    {
        return $this->hasOne(Perfil::className(), ['per_codigo' => 'per_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstCodigo()
    {
        return $this->hasOne(EstadoPerfil::className(), ['est_codigo' => 'est_codigo']);
    }
}
