<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "noticia".
 *
 * @property int $not_codigo
 * @property string $not_titulo
 * @property string $not_subtitulo
 * @property string $not_descripcion
 * @property string $not_enlace
 * @property int $sec_codigo
 *
 * @property Seccion $secCodigo
 * @property NoticiaArchivo[] $noticiaArchivos
 */
class Noticia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'noticia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['not_titulo', 'not_descripcion', 'not_enlace', 'sec_codigo'], 'required'],
            [['sec_codigo'], 'integer'],
            [['not_titulo', 'not_subtitulo'], 'string', 'max' => 200],
            [['not_descripcion'], 'string', 'max' => 5000],
            [['not_enlace'], 'string', 'max' => 1000],
            [['sec_codigo'], 'exist', 'skipOnError' => true, 'targetClass' => Seccion::className(), 'targetAttribute' => ['sec_codigo' => 'sec_codigo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'not_codigo' => 'Codigo',
            'not_titulo' => 'Título',
            'not_subtitulo' => 'Subtítulo',
            'not_descripcion' => 'Descripción',
            'not_enlace' => 'Enlace',
            'sec_codigo' => 'Sección',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSecCodigo()
    {
        return $this->hasOne(Seccion::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticiaArchivos()
    {
        return $this->hasMany(NoticiaArchivo::className(), ['not_codigo' => 'not_codigo']);
    }
}
