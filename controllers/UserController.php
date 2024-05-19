<?php

namespace app\controllers;

use app\models\shop\User;
use Yii;
use yii\web\Controller;
use app\models\shop\viewModels\Models;

class UserController extends Controller
{
    public function actionIndex()
    {
        $user = new User();

        return $this->render('user', compact('user'));
    }

    public function actionRegister()
    {
        $user = new User(['scenario' => User::SCENARIO_REGISTER]);

        if (Yii::$app->request->isPost){
            if ($user->load(Yii::$app->request->post())){
                if ($user->validate()){

                    $user->name = Yii::$app->request->post()["User"]['name'];
                    $user->phone = Yii::$app->request->post()["User"]['phone'];
                    $user->email = Yii::$app->request->post()["User"]['email'];
                    $user->password = Yii::$app->request->post()["User"]['password'];

                    $user->save();
                    Yii::$app->session->setFlash('success', 'Успешная регистрация');
                    return $this->refresh();
                }
                Yii::$app->session->setFlash('error', 'Введеные данные не прошли валидацию');
            }
        }


        return $this->render('register', compact('user'));
    }

    public function actionLogin()
    {
        $user = new User();

        if (!Yii::$app->user->isGuest) {
            return $this->goHome(['shop/index']);
        }

        $user = new User();

        if ($user->load(Yii::$app->request->post()) && $user->validate()) {

            $name = Yii::$app->request->post()["User"]['name'];
            $password = Yii::$app->request->post()["User"]['password'];
            $userModel = Models::getLoginUser($name, $password);

            if ($userModel !== null) {
                Yii::$app->user->login(User::findIdentity($userModel->id));
                return $this->goBack();
            }
        }
        
        return $this->render('login',compact('user'));
    }

    public function actionLogout()
    {
        $user = new User();
        Yii::$app->user->logout();

        return $this->render('login',compact('user'));
    }
}