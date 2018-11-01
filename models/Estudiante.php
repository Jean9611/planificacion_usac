<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property int $carnet
 * @property string $nombre
 * @property string $correo
 *
 * @property Indicador[] $indicadors
 * @property InscribirEstudiante[] $inscribirEstudiantes
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carnet', 'nombre', 'correo'], 'required'],
            [['carnet'], 'integer'],
            [['nombre', 'correo'], 'string', 'max' => 45],
            [['carnet'], 'unique'],
            [['correo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'carnet' => 'Carnet',
            'nombre' => 'Nombre',
            'correo' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIndicadors()
    {
        return $this->hasMany(Indicador::className(), ['carnet' => 'carnet']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscribirEstudiantes()
    {
        return $this->hasMany(InscribirEstudiante::className(), ['carnet' => 'carnet']);
    }
}
