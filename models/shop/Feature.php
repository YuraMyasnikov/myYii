<?php

namespace app\models\shop;

use Yii;

/**
 * This is the model class for table "feature".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $another_name
 *
 * @property ProductFeature[] $productFeatures
 */
class Feature extends \yii\db\ActiveRecord
{
    public $screen_size;
    public $screen_resolution;
    public $matrix;
    public $refresh_rate;
    public $count_hdmi;
    public $wifi_availability;
    public $bluetooth_availability;
    public $dimensions;
    public $backlight;
    public $height_adjustment;
    public $hdmi_availability;
    public $processor;
    public $ram;
    public $internal_memory;
    public $os;
    public $cleaning_type;
    public $power;
    public $power_adjustment;
    public $container_capacity;
    public $brush_type;
    public $cord_length;
    public $noise_level;
    public $automatic_charging;
    public $control_via_app;
    public $operating_time;
    public $weight;
    public $main_camera;
    public $front_camera;
    public $camera_count;
    public $battery_capacity;
    public $stylus_availability;
    public $boot_type;
    public $volume;
    public $energy_class;
    public $spin_speed;
    public $washing_noise_level;
    public $total_volume;
    public $refrigerator_type;
    public $no_forest_availability;
    public $illumination;
    public $number_of_shelves;
    public $availability_of_touch_control;
    public $battery_availability;
    public $compatibility;
    public $touch_screen_availability;
    public $pedometer;
    public $gps_availability;
    public $moisture_protection;
    public $type;
    public $number_of_burners;
    public $childproofing;
    public $material;
    public $automatic_shutdown;
    public $window_water_scale;
    public $concealed_heater;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feature';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'another_name'], 'string', 'max' => 255],
            [['name'], 'unique'],
            [['another_name'], 'unique'],

            [['screen_size','screen_resolution','matrix','refresh_rate','count_hdmi','wifi_availability','bluetooth_availability','dimensions','backlight',
                'height_adjustment','hdmi_availability','processor','ram','internal_memory','os','cleaning_type','power','power_adjustment',
                'container_capacity','brush_type','cord_length','noise_level','automatic_charging','control_via_app','operating_time','weight',
                'main_camera','front_camera','camera_count','battery_capacity','stylus_availability','boot_type','volume','energy_class',
                'spin_speed','washing_noise_level','total_volume','refrigerator_type','no_forest_availability','illumination','number_of_shelves',
                'availability_of_touch_control','battery_availability','compatibility','touch_screen_availability','pedometer','gps_availability',
                'moisture_protection','type','number_of_burners','childproofing','material','automatic_shutdown','window_water_scale','concealed_heater',]
                ,'safe'
            ]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'another_name' => 'Another Name',

            'screen_size' => 'размер экрана',
            'screen_resolution' => 'разрешение экрана',
            'matrix' => 'матрица ',
            'refresh_rate' => 'частота обновления',
            'count_hdmi' => 'количество портов',
            'wifi_availability' => 'наличие Wi-Fi',
            'bluetooth_availability' => 'наличие Bluetooth',
            'dimensions' => 'габариты Ш:В:Г',
            'backlight' => 'подсветка',
            'height_adjustment' => 'регулировка высоты',
            'hdmi_availability' => 'наличие HDMI',
            'processor' => 'процессор ',
            'ram' => 'оперативная память',
            'internal_memory' => 'внутреняя память',
            'os' => 'операционная система',
            'cleaning_type' => 'тип уборки',
            'power' => 'мощность',
            'power_adjustment' => 'наличие регулировки мощности',
            'container_capacity' => 'емкость контейнера',
            'brush_type' => 'тип щетки',
            'cord_length' => 'длинна шнура',
            'noise_level' => 'уровень шума',
            'automatic_charging' => 'наличие автоматическая зарядка',
            'control_via_app' => 'наличие контроля через приложение',
            'operating_time' => 'время работы',
            'weight' => 'вес ',
            'main_camera' => 'основная камера',
            'front_camera' => 'фронтальная камера',
            'camera_count' => 'количество камер',
            'battery_capacity' => 'емкость батареи',
            'stylus_availability' => 'наличие стилуса',
            'boot_type' => 'тип загрузки',
            'volume' => 'объем ',
            'energy_class' => 'класс энергопотребления',
            'spin_speed' => 'скорость отжима',
            'washing_noise_level' => 'уровень шума при стирке',
            'total_volume' => 'общий объем',
            'refrigerator_type' => 'тип холодильника',
            'no_forest_availability' => 'наличие No Forest',
            'illumination' => 'освещение ',
            'number_of_shelves' => 'количество полок',
            'availability_of_touch_control' => 'наличие управление по касанию',
            'battery_availability' => 'наличие аккумулятора',
            'compatibility' => 'совместимость',
            'touch_screen_availability' => 'наличие сенсерного экрана',
            'pedometer' => 'наличие шагомера',
            'gps_availability' => 'наличие GPS',
            'moisture_protection' => 'наличие влагозащиты',
            'type' => 'тип',
            'number_of_burners' => 'количество конфорок',
            'childproofing' => 'наличие защиты от детей',
            'material' => 'материал',
            'automatic_shutdown' => 'наличие автоматического выключения',
            'window_water_scale' => 'наличие оконноя шкала',
            'concealed_heater' => 'наличие скрытого нагревателя',
        ];
    }

    /**
     * Gets query for [[ProductFeatures]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductFeatures()
    {
        return $this->hasMany(ProductFeature::class, ['feature_id' => 'id']);
    }
}
