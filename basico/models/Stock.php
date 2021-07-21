<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id_stock
 * @property string|null $nome
 * @property int|null $quantidade
 * @property float|null $preco
 * @property string|null $validade
 * @property int|null $id_fornecedor
 *
 * @property Fornecedor $fornecedor
 */
class Stock extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quantidade', 'id_fornecedor'], 'integer'],
            [['preco'], 'number'],
            [['validade'], 'safe'],
            [['nome'], 'string', 'max' => 10],
            [['id_fornecedor'], 'exist', 'skipOnError' => true, 'targetClass' => Fornecedor::className(), 'targetAttribute' => ['id_fornecedor' => 'id_fornecedor']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_stock' => 'Id Stock',
            'nome' => 'Nome',
            'quantidade' => 'Quantidade',
            'preco' => 'Preco',
            'validade' => 'Validade',
            'id_fornecedor' => 'Id Fornecedor',
        ];
    }

    /**
     * Gets query for [[Fornecedor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedor()
    {
        return $this->hasOne(Fornecedor::className(), ['id_fornecedor' => 'id_fornecedor']);
    }
}
