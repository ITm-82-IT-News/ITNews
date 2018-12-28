<?php

namespace app\modules\blog\controllers;

use app\models\Page;
use app\models\User;

class PageController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $page = Page::find()->where(['id' => $id])->asArray()->one();
        $author = User::find()->where(['id' => $page['author']])->asArray()->one();

        return $this->render('index', ['page' => $page,
        	'author' => $author['username']]);
    }

}
