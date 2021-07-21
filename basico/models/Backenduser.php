<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backenduser".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $username
 * @property string|null $password
 * @property string|null $cargo
 */
class Backenduser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'backenduser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cargo'], 'string'],
            [['firstname'], 'string', 'max' => 10],
            [['lastname'], 'string', 'max' => 30],
            [['username', 'password'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'username' => 'Username',
            'password' => 'Password',
            'cargo' => 'Cargo',
        ];
    }
    public function getAuthKey(){
        return true;
    }

    public function getId(){
        return $this->id;
    }

    public function validateAuthKey($authKey){
       return true;
    }

    public static function findIdentity($id){
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null){
        throw new \yii\base\NotSupportedException();
    }

    public static function findByUsername($username){
        return self::findOne(['username'=>$username]);
    }

    public function validatePassword($password){
        return $this->password === $password;
    }
}
