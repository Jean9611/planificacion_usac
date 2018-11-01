<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignacion_usuario_curso".
 *
 * @property string $username
 * @property int $id_curso
 *
 * @property Curso $curso
 * @property Usuario $username0
 */
class Asignacion1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignacion_usuario_curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'id_curso'], 'required'],
            [['id_curso'], 'integer'],
            [['username'], 'string', 'max' => 20],
            [['username', 'id_curso'], 'unique', 'targetAttribute' => ['username', 'id_curso']],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id_curso']],
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
            'id_curso' => 'Id Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername0()
    {
        return $this->hasOne(Usuario::className(), ['username' => 'username']);
    }
}
