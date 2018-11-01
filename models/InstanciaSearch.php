<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instancia;

/**
 * InstanciaSearch represents the model behind the search form of `app\models\Instancia`.
 */
class InstanciaSearch extends Instancia
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_instancia', 'id_curso'], 'integer'],
            [['seccion', 'semestre'], 'safe'],
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
        $query = Instancia::find();

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
            'id_instancia' => $this->id_instancia,
            'id_curso' => $this->id_curso,
        ]);

        $query->andFilterWhere(['like', 'seccion', $this->seccion])
            ->andFilterWhere(['like', 'semestre', $this->semestre]);

        return $dataProvider;
    }
}
