<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignacion_usuario_instancia".
 *
 * @property string $username
 * @property int $id_instancia
 *
 * @property Instancia $instancia
 * @property Usuario $username0
 */
class AsignacionUsuarioInstancia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignacion_usuario_instancia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'id_instancia'], 'required'],
            [['id_instancia'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['username', 'id_instancia'], 'unique', 'targetAttribute' => ['username', 'id_instancia']],
            [['id_instancia'], 'exist', 'skipOnError' => true, 'targetClass' => Instancia::className(), 'targetAttribute' => ['id_instancia' => 'id_instancia']],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => Usuario::className(), 'targetAttribute' => ['username' => 'username']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'id_instancia' => 'Id Instancia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstancia()
    {
        return $this->hasOne(Instancia::className(), ['id_instancia' => 'id_instancia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(Usuario::className(), ['username' => 'username']);
    }
}
