<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prato;

/**
 * PratoSearch represents the model behind the search form of `app\models\Prato`.
 */
class PratoSearch extends Prato
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_prato', 'quantidade'], 'integer'],
            [['nome', 'image'], 'safe'],
            [['precocusto', 'precovenda'], 'number'],
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
        $query = Prato::find();

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
            'id_prato' => $this->id_prato,
            'precocusto' => $this->precocusto,
            'precovenda' => $this->precovenda,
            'quantidade' => $this->quantidade,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
