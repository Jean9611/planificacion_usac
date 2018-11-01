<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\db\Query;
use app\models\Asignacion1;

/**
 * Asignacion1Search represents the model behind the search form of `app\models\Asignacion1`.
 */
class Asignacion1Search extends Asignacion1
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username'], 'safe'],
            [['id_curso'], 'integer'],
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
        $query = Asignacion1::find();
        /*$query = new Query();
        $query->select('a.username as username, c.id_curso as id_curso, c.curso as curso')
            ->from ('Curso c, asignacion_usuario_curso a')
            ->where('c.id_curso = a.id_curso')
            ->all();*/

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
            'id_curso' => $this->id_curso,
        ]);

        $query->andFilterWhere(['like', 'username', $this->username]);

        return $dataProvider;
    }
}
