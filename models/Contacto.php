<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property int $con_codigo
 * @property string $con_nombre
 * @property string $con_correo
 * @property string $con_mensaje
 *
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['con_nombre', 'con_correo', 'con_mensaje'], 'required'],
            [['con_nombre'], 'string', 'max' => 50],
            [['con_correo'], 'string', 'max' => 255],
            [['con_mensaje'], 'string', 'max' => 5000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'con_codigo' => 'Con Codigo',
            'con_nombre' => 'Nombre',
            'con_correo' => 'Correo',
            'con_mensaje' => 'Mensaje',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

}
