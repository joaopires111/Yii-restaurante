<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "funcionario".
 *
 * @property int $id_funcionario
 * @property string|null $prinome
 * @property string|null $ultnome
 * @property int|null $nif
 * @property string|null $rua
 * @property int|null $nporta
 * @property string|null $codpostal
 * @property int|null $telefone
 * @property string|null $email
 * @property float|null $salario
 *
 * @property Codpostal $codpostal0
 */
class Funcionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'funcionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nif', 'nporta', 'telefone'], 'integer'],
            [['salario'], 'number'],
            [['prinome', 'ultnome'], 'string', 'max' => 50],
            [['rua', 'email'], 'string', 'max' => 20],
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
            'id_funcionario' => 'Id Funcionario',
            'prinome' => 'Prinome',
            'ultnome' => 'Ultnome',
            'nif' => 'Nif',
            'rua' => 'Rua',
            'nporta' => 'Nporta',
            'codpostal' => 'Codpostal',
            'telefone' => 'Telefone',
            'email' => 'Email',
            'salario' => 'Salario',
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
}
