<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo".
 *
 * @property int $tip_codigo
 * @property string $tip_nombre
 *
 * @property Archivo[] $archivos
 */
class Tipo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_nombre'], 'required'],
            [['tip_nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tip_codigo' => 'Tip Codigo',
            'tip_nombre' => 'Tip Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchivos()
    {
        return $this->hasMany(Archivo::className(), ['tip_codigo' => 'tip_codigo']);
    }
}
