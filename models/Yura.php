<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * Это класс модели для таблицы "yura".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string|null $description
 * @property string|null $image
 * @property string|null $images
 * @property int|null $city_id
 * @property string|null $created_at
 * @property bool|null $busy
 * @property int|null $position_id
 */

class Yura extends ActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';
    public $upload;
    public $images;
    public $password_repeat;
    public $newPass;
    public $newpass_repeat;
    public $delete_avtr;
    public $newAdress;
    public $newPosition;
    public $deleteAllGallery;

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_CREATE] = [
            'first_name',
            'last_name',
            'email',
            'password',
            'password_repeat',
            'description',
            'busy',
            'image',
            'images',
            'city_id',
            'newAdress',
            'position_id',
            'newPosition'
        ];
        $scenarios[self::SCENARIO_UPDATE] = [
            'first_name',
            'last_name',
            'email',
            'newPass',
            'newpass_repeat',
            'delete_avtr',
            'description',
            'busy',
            'image',
            'images',
            'city_id',
            'newAdress',
            'position_id',
            'newPosition',
            'deleteAllGallery'
        ];
        return $scenarios;
    }
    public static function tableName()
    {
        return 'yura';
    }
    public function attributeLabels()
    {
        return [
           'first_name' => 'Имя',
           'last_name' => 'Фамилия',
           'email' => 'email',
           'password' => 'Подтверди пароль',
           'password_repeat' => 'Пароль',
           'newPass' => 'Подтверди пароль',
           'newpass_repeat' => 'Пароль',
           'description' => 'Описание',
           'image' => 'Аватар',
           'images' => 'Галлерея',
           'city_id' => 'Город',
           'newAdress' => 'Новый город',
           'created_at' => 'Создано',
           'busy' => 'Занятость',
           'position_id' => 'Должность',
           'newPosition' => 'Новая должность',

        ];
    }
    public function rules()
    {
        return [
            [['first_name','last_name','email','busy'],'required', 'message'=>'Поле обязательно'],
            [['email'],'email', 'message' => 'формат email: example@gmail.com'],
            [['password','password_repeat'], 'string', 'min'=> 3, 'tooShort' => 'Мин. значение 3'],
            [['password','password_repeat'], 'string', 'max'=> 65, 'tooLong' => 'Макс. значение 65'],
            ['password', 'compare', "compareAttribute" => "password_repeat", 'message' => 'Пароли разные' ],
            [['newPass','newpass_repeat'], 'string', 'min'=> 3, 'tooShort' => 'Мин. значение 3'],
            [['newPass','newpass_repeat'], 'string', 'max'=> 65, 'tooLong' => 'Макс. значение 65'],
            ['newPass', 'compare', "compareAttribute" => "newpass_repeat", 'message' => 'Новые пароли разные'],
            [['description','first_name','last_name'], 'trim'],
            [['upload','image'], 'image', 'extensions' => 'jpg, jpeg, png, gif, webp'],
            [['images'], 'file', 'extensions' => 'jpg, jpeg, png, gif, webp', 'maxFiles' => 5],
            [['first_name','last_name','password','delete_avtr', 'newAdress','position_id','newPosition','deleteAllGallery'],'safe']
        ];
    }

    public function getImageUrl()
    {
        return "@web/".$this->image;
    }

    public function getCityName($id)
    {
        $cities = $this->getCity()->all();
        foreach ($cities as $city){
            if ($city->id == $this->city_id){
               return $city->name;
            }
        }
    }

    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'city_id']);
    }

    public function getImagesData()
    {
        return $this->hasMany(ImagesYura::class, ['user_id' => 'id']);
    }
}


/*
    ['password', 'string', 'length' => [3,15] ],
    ['agree', 'in', 'range' => [1] , "message" => 'должен согласиться'],
    ['name', 'match', 'pattern' => '/^[a-zа-я]\w*$/i', 'message' => 'буквы давай'],

public function myTestRule($key) // !!!!!!!!!!
    {
        if (! in_array($this->$key, ['юра', 'юрец','Юра'])){
            $this->addError($key,'ты не из юр');
        }
    }
*/