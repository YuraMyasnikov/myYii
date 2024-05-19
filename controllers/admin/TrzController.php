<?php

namespace app\controllers\admin;

use app\models\shop\Product;
use yii\db\mssql\PDO;
use yii\debug\models\search\Db;
use yii\web\Controller;
use app\models\shop\viewModels\Models;

class TrzController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionYu()
    {
        $models = Models::make();
        $dsn = 'mysql:host=localhost;dbname=kinopoisk';
        $username = 'root';
        $password = '';

        if (\Yii::$app->request->isPost) {

           /* try {
                $db = new PDO($dsn, $username, $password);
                echo "Подключились\n";
            } catch (Exception $e) {
                die("Не удалось подключиться: " . $e->getMessage());

            }*/

            if (\Yii::$app->request->isPost) {
               /* $db = \Yii::$app->db;
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    $db->createCommand("UPDATE product SET price = price+100 WHERE id = 1")->execute();
                    $transaction->commit();
                    \Yii::$app->session->setFlash('success', 'успешно');
                    $this->redirect(['admin/trz/index']);

                } catch (Exception $e) {
                    $transaction->rollback();
                    \Yii::$app->session->setFlash('error', "ошибка $e");
                    $this->redirect(['admin/trz/index']);
                }*/

                $db = \Yii::$app->db;
                $transiction = $db->beginTransaction();
                try {
                    $model = $models::getProduct(3);
                    $model->price = $model->price + 100;
                    $model->save();
                    \Yii::$app->session->setFlash('success', 'первая ступень');

                    $transiction->commit();
                    $this->redirect(\Yii::$app->request->referrer);
                }
                catch (\Exception $e){
                    $transiction->rollBack();
                    \Yii::$app->session->setFlash('error', 'ошибка');
                    $this->redirect(\Yii::$app->request->referrer);
                }

            }

        }
    }
}