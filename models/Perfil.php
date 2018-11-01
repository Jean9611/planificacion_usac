<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Perfil".
 *
 * @property int $id_perfil
 * @property string $nombre
 * @property resource $descripcion
 * @property int $id_instancia
 *
 * @property Competencia[] $competencias
 * @property Instancia $instancia
 */
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string'],
            [['id_instancia'], 'required'],
            [['id_instancia'], 'integer'],
            [['nombre'], 'string', 'max' => 45],
            [['id_instancia'], 'exist', 'skipOnError' => true, 'targetClass' => Instancia::className(), 'targetAttribute' => ['id_instancia' => 'id_instancia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_perfil' => 'Id Perfil',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripcion',
            'id_instancia' => 'Id Instancia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencias()
    {
        return $this->hasMany(Competencia::className(), ['id_perfil' => 'id_perfil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstancia()
    {
        return $this->hasOne(Instancia::className(), ['id_instancia' => 'id_instancia']);
    }
}
