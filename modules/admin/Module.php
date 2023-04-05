<?php

namespace app\modules\admin;
use Yii;
use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
	public $layout ='/admin'; 
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
	/**
     * @функція поведінки
     */

    public function behaviors()
    {
        return [
            'access'    =>  [
                'class' =>  AccessControl::className(),
                'denyCallback'  =>  function($rule, $action)
                {
                    throw new \yii\web\NotFoundHttpException();
                },
                'rules' =>  [
                    [
                        'allow' =>  true,
                        'matchCallback' =>  function($rule, $action)
                        {							
		/*if (Yii::$app->user->identity != NULL){return Yii::$app->user->identity->isAdmin;	} else {return 0;} */
                          return (Yii::$app->user->identity != NULL) ? Yii::$app->user->identity->isAdmin : 0;								
                        }
                    ]
                ]
            ]
        ];
    }
}
