<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prato".
 *
 * @property int $id_prato
 * @property string|null $nome
 * @property float|null $precocusto
 * @property float|null $precovenda
 * @property string|null $image
 *
 * @property Takeaway[] $takeaways
 */
class Prato extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'prato';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['precocusto', 'precovenda'], 'number'],
            [['image'], 'string'],
            [['nome'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_prato' => 'Id Prato',
            'nome' => 'Nome',
            'precocusto' => 'Precocusto',
            'precovenda' => 'Precovenda',
            'image' => 'Image',
        ];
    }

    /**
     * Gets query for [[Takeaways]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTakeaways()
    {
        return $this->hasMany(Takeaway::className(), ['id_prato' => 'id_prato']);
    }
}
