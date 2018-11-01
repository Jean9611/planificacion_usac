<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Indicador;

/**
 * IndicadorSearch represents the model behind the search form of `app\models\Indicador`.
 */
class IndicadorSearch extends Indicador
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_indicador', 'evaluacion', 'id_actividad', 'carnet'], 'integer'],
            [['tipo_indicador'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Indicador::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_indicador' => $this->id_indicador,
            'evaluacion' => $this->evaluacion,
            'id_actividad' => $this->id_actividad,
            'carnet' => $this->carnet,
        ]);

        $query->andFilterWhere(['like', 'tipo_indicador', $this->tipo_indicador]);

        return $dataProvider;
    }
}
