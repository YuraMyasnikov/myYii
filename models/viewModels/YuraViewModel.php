<?php

namespace app\models\viewModels;

use app\models\City;
use app\models\Position;
use app\models\Yura;
use yii\base\Model;

class YuraViewModel extends Model
{
    protected Yura|null $model = null;

    /*static public function initWithModel(Yura $model): self {
        $obj = new self();
        $obj->model = $model;
        return $obj;
    }

    public function getModel(): Yura|null
    {
        return $this->model;
    }*/

    public function getTitleUpdate($model): string
    {
        return "Редактирование {$model->first_name} {$model->last_name}";
    }
    public function getTitleCreate(): string
    {
        return 'Создание пользователя';
    }

    public function getCities(): array
    {
        $allCities = City::find()->asArray()->all();
        $allCities = array_merge([['name' => 'Не установлено','id'=> 0]], $allCities);
        $cities = array_column($allCities, 'name','id');

        return $cities;
    }
    public function getPositions(): array
    {
        $allPositions = Position::find()->asArray()->all();
        $allPositions = array_merge([['position' => 'Не установлено', 'id' => 0]],$allPositions);
        $positions = array_column($allPositions, 'name', 'id');

        return $positions;
    }

    public function getScenarioUpdate($model): void
    {
        $model->scenario = Yura::SCENARIO_UPDATE;
    }
    public function getScenarioCreate($model): void
    {
        $model->scenario = Yura::SCENARIO_CREATE;
    }

    public function getCreateSuccessMessage($model): string
    {
        return "Дабавлен {$model->first_name} <img src={$model->image} style='width: 50px; border:10px;'/>";
    }

}