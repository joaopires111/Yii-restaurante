<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form of `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'nif', 'nporta', 'telefone'], 'integer'],
            [['prinome', 'ultnome', 'rua', 'codpostal', 'email'], 'safddde'],
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
        $query = Cliente::find();

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
            'id_cliente' => $this->id_cliente,
            'nif' => $this->nif,
            'nporta' => $this->nporta,
            'telefone' => $this->telefone,
        ]);

        $query->andFilterWhere(['like', 'prinome', $this->prinome])
            ->andFilterWhere(['like', 'ultnome', $this->ultnome])
            ->andFilterWhere(['like', 'rua', $this->rua])
            ->andFilterWhere(['like', 'codpostal', $this->codpostal])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
