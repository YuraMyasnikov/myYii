<?php

namespace app\models;

use app\models\Yura;
use yii\data\ActiveDataProvider;
use app\models\viewModels\YuraViewModel;

/**
 * @param string $first_name
 */
class YuraSearch extends Yura
{
    public $startDay;
    public $startClock;
    public $finishDay;
    public $finishClock;



    public function rules()
    {
        return [
            [['id'],'integer'],
            [['first_name','email','startDay','finishDay','startClock','finishClock','city_id'],'safe']
        ];
    }
    public function attributeLabels()
    {
        return [
            'startDay' => 'с',
            'finishDay' => 'до',
            'startClock' => 'с',
            'finishClock' => 'до'
        ];
    }

    public function search($param)
    {
        $query = Yura::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
            'sort' => [ ],
        ]);

        if( !$this->load($param) && !$this->validate())
        {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['OR',['like', 'first_name', $this->first_name],['like', 'last_name', $this->first_name]]);
        $query->andFilterWhere(['like', 'email', $this->email]);
        $query->andFilterWhere(['in','city_id', $this->city_id]);


        if (!empty($this->startDay)){                                           // если поле 'дня с' не пустое
            $startD = new \DateTime($this->startDay);                           // создаю экземпляр класса с данными которые получил
            if(!empty($this->startClock)){                                      // если поле 'часы с' не пустое
                $startC = $this->startClock . ':00';                            // сохоаняю полученое значение с доп нулями
                $startC = explode(':', $startC);                       // сохраняю в массив ЧМС
                $startD = $startD
                    ->setTime($startC[0],$startC[1],$startC[2])                 // устанавливаю в инстанс полученое время
                    ->format('Y-m-d H:i:s');                             // храню в виде строки в нужном формате
                $query->andFilterWhere(['>=', 'created_at', $startD]);          // фильтрую  [ сравнение по признаку | с чем сравниваю | сравниваю ]
            }else
            {
                $startD = $startD->format('Y-m-d H:i:s');                // делаю строкой с форматом, для сравнения с значением в БД
                $query->andFilterWhere(['>=', 'created_at', $startD]);          // фильтрую  [ сравнение по признаку | с чем сравниваю | сравниваю ]
            }
        }

        if (!empty($this->finishDay)){
            $finishD = new \DateTime($this->finishDay);
            if(!empty($this->finishClock)){
                $finishC = $this->finishClock . ':59';
                $finishC = explode(':', $finishC);
                $finishD = $finishD
                    ->setTime($finishC[0],$finishC[1],$finishC[2])
                    ->format('Y-m-d H:i:s');
                $query->andFilterWhere(['<=', 'created_at', $finishD]);
            }else {
                $finishD = $finishD
                    ->setTime(23, 59, 59)
                    ->format('Y-m-d H:i:s');
                $query->andFilterWhere(['<=', 'created_at', $finishD]);
            }
        }
        return $dataProvider;

    }
}
