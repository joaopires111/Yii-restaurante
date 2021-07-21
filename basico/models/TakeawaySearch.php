<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Takeaway;

/**
 * TakeawaySearch represents the model behind the search form of `app\models\Takeaway`.
 */
class TakeawaySearch extends Takeaway
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_takeaway', 'id_cliente', 'id_prato'], 'integer'],
            [['valor'], 'number'],
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
        $query = Takeaway::find();

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
            'id_takeaway' => $this->id_takeaway,
            'valor' => $this->valor,
            'id_cliente' => $this->id_cliente,
            'id_prato' => $this->id_prato,
        ]);

        return $dataProvider;
    }
}