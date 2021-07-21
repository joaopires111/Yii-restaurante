<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property int $id_cliente
 * @property string|null $prinome
 * @property string|null $ultnome
 * @property int|null $nif
 * @property string|null $rua
 * @property int|null $nporta
 * @property string|null $codpostal
 * @property int|null $telefone
 * @property string|null $email
 *
 * @property Codpostal $codpostal0
 * @property Reserva[] $reservas
 * @property Takeaway[] $takeaways
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nif', 'nporta', 'telefone'], 'integer'],
            [['prinome', 'ultnome', 'email'], 'string', 'max' => 20],
            [['rua'], 'string', 'max' => 50],
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
            'id_cliente' => 'Id Cliente',
            'prinome' => 'Prinome',
            'ultnome' => 'Ultnome',
            'nif' => 'Nif',
            'rua' => 'Rua',
            'nporta' => 'Nporta',
            'codpostal' => 'Codpostal',
            'telefone' => 'Telefone',
            'email' => 'Email',
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
     * Gets query for [[Reservas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Takeaways]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTakeaways()
    {
        return $this->hasMany(Takeaway::className(), ['id_cliente' => 'id_cliente']);
    }
}
