<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fornecedor".
 *
 * @property int $id_fornecedor
 * @property string|null $nome
 * @property string|null $rua
 * @property int|null $nporta
 * @property string $codpostal
 * @property int|null $telefone
 *
 * @property Codpostal $codpostal0
 * @property Stock[] $stocks
 */
class Fornecedor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fornecedor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nporta', 'telefone'], 'integer'],
            [['codpostal'], 'required'],
            [['nome'], 'string', 'max' => 20],
            [['rua'], 'string', 'max' => 100],
            [['codpostal'], 'string', 'max' => 10],
            [['codpostal'], 'exist', 'skipOnError' => true, 'targetClass' => Codpostal::className(), 'targetAttribute' => ['codpostal' => 'codpostal']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_fornecedor' => 'Id Fornecedor',
            'nome' => 'Nome',
            'rua' => 'Rua',
            'nporta' => 'Nporta',
            'codpostal' => 'Codpostal',
            'telefone' => 'Telefone',
        ];
    }

    /**
     * Gets query for [[Codpostal0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCodpostal0()
    {
        return $this->hasOne(Codpostal::className(), ['codpostal' => 'codpostal']);
    }

    /**
     * Gets query for [[Stocks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stock::className(), ['id_fornecedor' => 'id_fornecedor']);
    }
}
