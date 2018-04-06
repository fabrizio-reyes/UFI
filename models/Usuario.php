<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $usu_telefono
 * @property string $usu_nombre
 * @property string $authKey
 * @property string $accessToken
 *
 * @property UsuarioPerfil[] $usuarioPerfils
 * @property UsuarioSeccion[] $usuarioSeccions
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'usu_telefono', 'usu_nombre', 'authKey', 'accessToken'], 'required'],
            [['username'], 'string', 'max' => 255],
            [['password', 'usu_telefono', 'usu_nombre'], 'string', 'max' => 50],
            [['authKey', 'accessToken'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'usu_telefono' => 'Usu Telefono',
            'usu_nombre' => 'Usu Nombre',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }
	
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioPerfils()
    {
        return $this->hasMany(UsuarioPerfil::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioSeccions()
    {
        return $this->hasMany(UsuarioSeccion::className(), ['id' => 'id']);
    }
	/**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken'=>$token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
