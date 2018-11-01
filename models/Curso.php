<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Curso".
 *
 * @property int $id_curso
 * @property string $curso
 *
 * @property Instancia[] $instancias
 * @property AsignacionUsuarioCurso[] $asignacionUsuarioCursos
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Curso';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_curso', 'curso'], 'required'],
            [['id_curso'], 'integer'],
            [['curso'], 'string', 'max' => 45],
            [['id_curso'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'curso' => 'Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstancias()
    {
        return $this->hasMany(Instancia::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignacionUsuarioCursos()
    {
        return $this->hasMany(AsignacionUsuarioCurso::className(), ['id_curso' => 'id_curso']);
    }
}
