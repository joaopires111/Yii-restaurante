<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "codpostal".
 *
 * @property string $codpostal
 * @property string|null $localidade
 *
 * @property Cliente[] $clientes
 * @property Fornecedor[] $fornecedors
 * @property Funcionario[] $funcionarios
 */
class Codpostal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'codpostal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codpostal'], 'required'],
            [['codpostal', 'localidade'], 'string', 'max' => 20],
            [['codpostal'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'codpostal' => 'Codpostal',
            'localidade' => 'Localidade',
        ];
    }

    /**
     * Gets query for [[Clientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['codpostal' => 'codpostal']);
    }

    /**
     * Gets query for [[Fornecedors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFornecedors()
    {
        return $this->hasMany(Fornecedor::className(), ['codpostal' => 'codpostal']);
    }

    /**
     * Gets query for [[Funcionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFuncionarios()
    {
        return $this->hasMany(Funcionario::className(), ['codpostal' => 'codpostal']);
    }
}
