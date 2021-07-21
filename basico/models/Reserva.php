<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reserva".
 *
 * @property int $id_reserva
 * @property int|null $num_pessoas
 * @property int $id_cliente
 * @property int $id_mesa
 * @property string $hora
 *
 * @property Cliente $cliente
 * @property Mesa $mesa
 */
class Reserva extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reserva';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['num_pessoas', 'id_cliente', 'id_mesa'], 'integer'],
            [['id_cliente', 'id_mesa'], 'required'],
            [['hora'], 'safe'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
            [['id_mesa'], 'exist', 'skipOnError' => true, 'targetClass' => Mesa::className(), 'targetAttribute' => ['id_mesa' => 'id_mesa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_reserva' => 'Id Reserva',
            'num_pessoas' => 'Num Pessoas',
            'id_cliente' => 'Id Cliente',
            'id_mesa' => 'Id Mesa',
            'hora' => 'Hora',
        ];
    }

    /**
     * Gets query for [[Cliente]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['id_cliente' => 'id_cliente']);
    }

    /**
     * Gets query for [[Mesa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMesa()
    {
        return $this->hasOne(Mesa::className(), ['id_mesa' => 'id_mesa']);
    }
}
