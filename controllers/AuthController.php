<?php

namespace app\controllers;

use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\web\Controller;

class AuthController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    
    public function actionSignup()
    {
        $model = new SignupForm();

        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());
            if($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }
        return $this->render('signup', ['model'=>$model]);
    }
// процедури для налагодження програми 
    public function actionTest()// процедура для перевірки статусу користувача, ввести  http://127.0.0.1/auth/test 
    {
        $user = User::findOne(1);
		
		//var_dump(Yii::$app->user->identity->isAdmin);die;
       // Yii::$app->user->logout();        
        if(Yii::$app->user->isGuest)
        {
            echo 'Користувач гість';
        }
        else
        {
            echo 'Користувач Індетифікован';
        }
    }
}