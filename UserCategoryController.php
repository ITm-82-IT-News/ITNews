<?php

namespace app\modules\blog\controllers;

use Yii;
use app\models\Post;
use app\models\Category;

class CategoryController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
    	$posts = Post::find()->
    	where(['category' => $id])->
        asArray()->
        all();

        $category = Category::find()->
        where(['id' => $id])->
        asArray()->
        one();

        return $this->render('index',
        	['posts' => $posts,
            'categoryName' => $category['title']]);
    }

}
