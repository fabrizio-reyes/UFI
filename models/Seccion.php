<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "seccion".
 *
 * @property int $sec_codigo
 * @property string $sec_nombre
 * @property string $sec_titulo
 * @property string $sec_descripcion
 * @property int $sec_orden
 *
 * @property Contacto[] $contactos
 * @property DatosUfi[] $datosUfis
 * @property Diplomado[] $diplomados
 * @property FormacionIntegral[] $formacionIntegrals
 * @property Linea[] $lineas
 * @property Noticia[] $noticias
 * @property Personal[] $personals
 * @property UsuarioSeccion[] $usuarioSeccions
 */
class Seccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sec_orden'], 'required'],
            [['sec_orden'], 'integer'],
            [['sec_nombre'], 'string', 'max' => 50],
            [['sec_titulo'], 'string', 'max' => 100],
            [['sec_descripcion'], 'string', 'max' => 10000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sec_codigo' => 'Sec Codigo',
            'sec_nombre' => 'Nombre',
            'sec_titulo' => 'Título',
            'sec_descripcion' => 'Descripción',
            'sec_orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactos()
    {
        return $this->hasMany(Contacto::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosUfis()
    {
        return $this->hasMany(DatosUfi::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiplomados()
    {
        return $this->hasMany(Diplomado::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormacionIntegrals()
    {
        return $this->hasMany(FormacionIntegral::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineas()
    {
        return $this->hasMany(Linea::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNoticias()
    {
        return $this->hasMany(Noticia::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonals()
    {
        return $this->hasMany(Personal::className(), ['sec_codigo' => 'sec_codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioSeccions()
    {
        return $this->hasMany(UsuarioSeccion::className(), ['sec_codigo' => 'sec_codigo']);
    }
}
