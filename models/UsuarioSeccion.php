<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario_seccion".
 *
 * @property int $usu_sec_codigo
 * @property int $id
 * @property int $sec_codigo
 * @property string $usu_sec_fecha
 *
 * @property Usuario $id0
 * @property Seccion $secCodigo
 */
class UsuarioSeccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario_seccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'sec_codigo', 'usu_sec_fecha'], 'required'],
            [['id', 'sec_codigo'], 'integer'],
            [['usu_sec_fecha'], 'safe'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['id' => 'id']],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'usu_sec_codigo' => 'Usu Sec Codigo',
            'id' => 'ID',
            'sec_codigo' => 'Sec Codigo',
            'usu_sec_fecha' => 'Usu Sec Fecha',
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
    public function getSecCodigo()
    {
        return $this->hasOne(Seccion::className(), ['sec_codigo' => 'sec_codigo']);
    }
}
