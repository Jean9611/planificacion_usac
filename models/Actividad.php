<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Actividad".
 *
 * @property int $id_actividad
 * @property string $nombre
 * @property resource $descripcion
 * @property resource $recursos
 * @property string $tipo_indicador
 * @property int $id_competencia
 *
 * @property Competencia $competencia
 * @property Indicador[] $indicadors
 */
class Actividad extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Actividad';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'recursos'], 'string'],
            [['id_competencia'], 'required'],
            [['id_competencia'], 'integer'],
            [['nombre', 'tipo_indicador'], 'string', 'max' => 45],
            [['id_competencia'], 'exist', 'skipOnError' => true, 'targetClass' => Competencia::className(), 'targetAttribute' => ['id_competencia' => 'id_competencia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_actividad' => 'Id Actividad',
            'nombre' => 'Nombre',
            'descripcion' => 'Descripción',
            'recursos' => 'Recursos',
            'tipo_indicador' => 'Tipo de Indicador',
            'id_competencia' => 'Competencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencia()
    {
        return $this->hasOne(Competencia::className(), ['id_competencia' => 'id_competencia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadors()
    {
        return $this->hasMany(Indicador::className(), ['id_actividad' => 'id_actividad']);
    }
}
