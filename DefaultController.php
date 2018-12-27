<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

/**
 * Default controller for the `Admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function beforeAction()
    {

    	if(Yii::$app->user->identity == null)
    	{
    		 Yii::$app->response->redirect(Url::to('site/login'));    	
    	}
    	else{
    		return parent::beforeAction($action);
    	} 
    }
    public function actionIndex()
    {
        return $this->render('index');
    }
}
