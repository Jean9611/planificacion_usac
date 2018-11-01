<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Indicador".
 *
 * @property int $id_indicador
 * @property string $tipo_indicador
 * @property int $evaluacion
 * @property int $id_actividad
 * @property int $carnet
 *
 * @property Actividad $actividad
 * @property Estudiante $carnet0
 */
class Indicador extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Indicador';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['evaluacion', 'id_actividad', 'carnet'], 'integer'],
            [['id_actividad', 'carnet'], 'required'],
            [['tipo_indicador'], 'string', 'max' => 15],
            [['id_actividad'], 'exist', 'skipOnError' => true, 'targetClass' => Actividad::className(), 'targetAttribute' => ['id_actividad' => 'id_actividad']],
            [['carnet'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['carnet' => 'carnet']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_indicador' => 'Id Indicador',
            'tipo_indicador' => 'Tipo de Indicador',
            'evaluacion' => 'Evaluación',
            'id_actividad' => 'Actividad',
            'carnet' => 'Carnet',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActividad()
    {
        return $this->hasOne(Actividad::className(), ['id_actividad' => 'id_actividad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarnet0()
    {
        return $this->hasOne(Estudiante::className(), ['carnet' => 'carnet']);
    }
}
