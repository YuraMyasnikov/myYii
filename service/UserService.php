<?php

namespace app\service;

use app\models\City;
use app\models\ImagesYura;
use app\models\Position;
use app\models\Yura;
use Yii;
use yii\web\UploadedFile;

class UserService
{

    public function store(Yura $model, UploadedFile $avatar = null, array $gallery = null)
    {
        if ($model->scenario === 'create')
        {
            $this->createHashInPassword($model);
            $this->craeteDate($model);
            $this->createAvatar($model,$avatar);
            $this->createNewCity($model);
            $this->createNewPosition($model);
            $model->save(false);        //сохранение перед createGallery чтобы получить id
            $this->createGallery($model,$gallery);
        }
        elseif ($model->scenario === 'update')
        {
            $this->updateHashInPassword($model);
            $this->updateAvatar($model,$avatar);
            $this->deleteAvatar($model);
            $this->createNewCity($model);
            $this->createNewPosition($model);
            $this->deleteAllGallery($model);
            $model->save(false);

            $this->updateGallery($model,$gallery);
        }

        return $model;
    }

    private function createHashInPassword($model)
    {
        if ($model->password != null){
            $hush = password_hash($model->password, PASSWORD_DEFAULT);
            if (password_verify($model->password_repeat, $hush)) $model->password = $hush;
        }
    }
    private function craeteDate($model)
    {
        $date = new \DateTime();
        $model->created_at = $date->format('Y-m-d H:i:s');
    }
    private function createAvatar($model, $avatar)
    {
        $model->upload = $avatar;
        if ($model->upload){
            $path = "uploads/{$model->upload->baseName}.{$model->upload->extension}";
            $model->image = $path;
            $model->upload->saveAs($path);
        }
        else{
            $model->image = "uploads/default.jpg";
        }
    }
    private function createGallery($model,$gallery)
    {
        $model->images = $gallery;
        if ($model->images){
            foreach ($model->images as $image){
                $images = new ImagesYura();
                $random_name = \Yii::$app->security->generateRandomString();
                $fileName = $model->id.'_'.$random_name.".{$model->upload->extension}";
                $path = "uploads/{$fileName}";
                $images->user_id = $model->id;
                $images->images = $path;
                $images->save(false);
                $image->saveAs($path);
            }
        }
    }
    private function createNewCity($model)
    {
        $allCities = array_column(City::find()->asArray()->all(), 'name','id');
        if ($model->newAdress != ''){
            $trigger = true;
            $newCity = ltrim($model->newAdress);
            foreach ($allCities as $item){
                if ($item == $newCity){
                    $trigger = false;
                }
            }

            if ($trigger){
                $city = new City();
                $city->name = $newCity;
                $city->save();
                $model->city_id = $city->id;
            }
        }
    }
    private function createNewPosition($model)
    {
        $allPositions = array_column(Position::find()->asArray()->all(), 'name','id');
        if ($model->newPosition != ''){
            $trigger = true;
            $newPosition = ltrim($model->newPosition);
            foreach ($allPositions as $item){
                if ($item == $newPosition){
                    $trigger = false;
                }
            }

            if ($trigger){
                $position = new Position();
                $position->name = $newPosition;
                $position->save();
                $model->position_id = $position->id;
            }
        }
    }
    private function updateHashInPassword($model)
    {
        if ($model->newPass != null && $model->newPass !== $model->oldAttributes['password'] ){
            $hush = password_hash($model->newPass, PASSWORD_DEFAULT);
            if (password_verify($model->newpass_repeat, $hush)) $model->password = $hush;
        }
    }
    private function updateAvatar($model,$avatar)
    {
        $model->upload = $avatar;
        if ($model->upload){
            $path = "uploads/{$model->upload->baseName}.{$model->upload->extension}";
            $model->image = "uploads/{$model->upload->baseName}.{$model->upload->extension}";
            $model->upload->saveAs($path);
            Yii::$app->session->setFlash('success',"Успешно изменен");
        }
        else
        {
            $model->oldAttributes['image'] ? $model->image = $model->oldAttributes['image'] : "uploads/default.jpg";
        }
    }
    private function deleteAvatar($model)
    {
        if ($model->delete_avtr === 'delete') $model->image = "uploads/default.jpg";
    }
    private function updateGallery($model,$gallery)
    {
        if ($gallery != null) {
            $model->images = $gallery;
            if (count($model->images) + count($model->imagesData) <= 5) {
                if ($model->images) {
                    foreach ($model->images as $image) {
                        $images = new ImagesYura();
                        $random_name = Yii::$app->security->generateRandomString();
                        $fileName = $model->id . '_' . $random_name . ".{$image->extension}";
                        $path = "uploads/{$fileName}";
                        $images->user_id = $model->id;
                        $images->images = $path;
                        $images->save(false);
                        $image->saveAs($path);
                    }
                } else {
                    $var1 = 'Ты можешь еще ' . (5 - count($model->imagesData)) . ' изобрежения. ' . (count($model->images)) . ' много';
                    $var2 = 'Ты больше не можешь загрузить';
                    $message = (count($model->imagesData) < 5) ? $var1 : $var2;
                    Yii::$app->session->setFlash('error', $message);
//                    return $this->refresh("yura/update?id={$model->id}");
                }
                Yii::$app->session->setFlash('success', "Успешно изменен");
//                return $this->refresh("yura/update?id={$model->id}");
            }
        }
    }
    private function deleteAllGallery($model)
    {
        if($model->deleteAllGallery){
            foreach ($model->imagesData as $item)
            {
               ($model->id == $item->user_id) ? $item->delete() : '';
              /* dd($model->id, $item->user_id);*/
            }
        }

    }

}