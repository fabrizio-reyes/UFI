<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticia_archivo".
 *
 * @property int $not_arc_codigo
 * @property int $not_codigo
 * @property int $arc_codigo
 *
 * @property Noticia $notCodigo
 * @property Archivo $arcCodigo
 */
class NoticiaArchivo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia_archivo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['not_codigo', 'arc_codigo'], 'required'],
            [['not_codigo', 'arc_codigo'], 'integer'],
            [['not_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Noticia::className(), 'targetAttribute' => ['not_codigo' => 'not_codigo']],
            [['arc_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Archivo::className(), 'targetAttribute' => ['arc_codigo' => 'arc_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'not_arc_codigo' => 'Not Arc Codigo',
            'not_codigo' => 'Not Codigo',
            'arc_codigo' => 'Arc Codigo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNotCodigo()
    {
        return $this->hasOne(Noticia::className(), ['not_codigo' => 'not_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArcCodigo()
    {
        return $this->hasOne(Archivo::className(), ['arc_codigo' => 'arc_codigo']);
    }
}
