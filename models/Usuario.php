<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Usuario".
 *
 * @property string $username
 * @property string $nombre
 * @property string $password
 * @property int $tipo_usuario
 * @property string $email
 *
 * @property AsignacionUsuarioCurso[] $asignacionUsuarioCursos
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Usuario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'nombre', 'password', 'email'], 'required'],
            [['tipo_usuario'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['nombre', 'password', 'email'], 'string', 'max' => 45],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'nombre' => 'Nombre',
            'password' => 'Password',
            'tipo_usuario' => 'Tipo Usuario',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignacionUsuarioCursos()
    {
        return $this->hasMany(AsignacionUsuarioCurso::className(), ['username' => 'username']);
    }

   public static function findIdentity($id)  
   {
       return self::findOne($id);  
   }  

   public function validatePassword($password)  
   {  
       return $this->password === $password;  
   }  

   public static function findByUserName($name)  
   {  
       return new static(self::findOne(['username' => $name]));  
   }  

      public static function findIdentityByAccessToken($token, $type = null)  
      {
          throw new NotSupportedException();       
      }

      public function getId()  
      {
          return $this->username;
      }

      public function getAuthKey()  
      {
          return $this->username;
      }

      public function validateAuthKey($authKey)  
      {
          return $this->authKey === $authKey;  
      }
}
