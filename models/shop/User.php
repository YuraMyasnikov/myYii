<?php

namespace app\models\shop;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    const SCENARIO_REGISTER = 'register';
    public $password_repeat;

    public static function tableName()
    {
        return 'user';
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Ваше Имя',
            'email' => 'Ваш email',
            'phone' => 'Номер вашего контактного телефона',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль'
        ];
    }

    public function rules()
    {
        return [
            [['name', 'password'], 'required'],
            [['password_repeat'], 'required', 'on' => self::SCENARIO_REGISTER ],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают", 'on' => self::SCENARIO_REGISTER],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_REGISTER] = ['name','email','phone','password','password_repeat'];
        return $scenarios;
    }


    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    public static function findIdentityByUsername($username)
    {
        return User::findOne(['name' => $username]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public static function id()
    {
        return $_SESSION['__id'];
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }


}