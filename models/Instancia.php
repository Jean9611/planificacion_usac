<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Instancia".
 *
 * @property int $id_instancia
 * @property string $seccion
 * @property string $semestre
 * @property int $id_curso
 *
 * @property Competencia[] $competencias
 * @property InscribirEstudiante[] $inscribirEstudiantes
 * @property Curso $curso
 */
class Instancia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Instancia';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seccion', 'semestre', 'id_curso'], 'required'],
            [['id_curso'], 'integer'],
            [['seccion', 'semestre'], 'string', 'max' => 45],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id_curso']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_instancia' => 'Id Instancia',
            'seccion' => 'Seccion',
            'semestre' => 'Semestre',
            'id_curso' => 'Id Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencias()
    {
        return $this->hasMany(Competencia::className(), ['id_instancia' => 'id_instancia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInscribirEstudiantes()
    {
        return $this->hasMany(InscribirEstudiante::className(), ['id_instancia' => 'id_instancia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCurso()
    {
        return $this->hasOne(Curso::className(), ['id_curso' => 'id_curso']);
    }
}
