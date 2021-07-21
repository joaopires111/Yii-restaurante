<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "takeaway".
 *
 * @property int $id_takeaway
 * @property int $id_cliente
 * @property int $id_prato
 *
 * @property Cliente $cliente
 * @property Prato $prato
 */
class Takeaway extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'takeaway';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_cliente', 'id_prato'], 'required'],
            [['id_cliente', 'id_prato'], 'integer'],
            [['id_cliente'], 'exist', 'skipOnError' => true, 'targetClass' => Cliente::className(), 'targetAttribute' => ['id_cliente' => 'id_cliente']],
            [['id_prato'], 'exist', 'skipOnError' => true, 'targetClass' => Prato::className(), 'targetAttribute' => ['id_prato' => 'id_prato']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_takeaway' => 'Id Takeaway',
            'id_cliente' => 'Id Cliente',
            'id_prato' => 'Id Prato',
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
     * Gets query for [[Prato]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrato()
    {
        return $this->hasOne(Prato::className(), ['id_prato' => 'id_prato']);
    }
}
