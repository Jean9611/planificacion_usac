<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Competencia".
 *
 * @property int $id_competencia
 * @property string $nombre
 * @property resource $descripcion
 * @property int $id_perfil
 *
 * @property Actividad[] $actividads
 * @property Perfil $perfil
 */
class Competencia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Competencia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['id_perfil'], 'required'],
            [['id_perfil'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['id_perfil'], 'exist', 'skipOnError' => true, 'targetClass' => Perfil::className(), 'targetAttribute' => ['id_perfil' => 'id_perfil']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_competencia' => 'Id Competencia',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'id_perfil' => 'Sección',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividads()
    {
        return $this->hasMany(Actividad::className(), ['id_competencia' => 'id_competencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::className(), ['id_perfil' => 'id_perfil']);
    }
}
