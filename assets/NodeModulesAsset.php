<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class NodeModulesAsset extends AssetBundle
{
    public $sourcePath = 'C:\OSPanel\home\yii\node_modules/bootstrap-icons/font/';

    public $css = [
        'bootstrap-icons.css'
    ];

}
