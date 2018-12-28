<?php

namespace app\modules\blog\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Page;
use app\models\Comments;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

class MenuWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {    	
        $pages = Page::find()->
        select(['id','title'])->
        where(['status' => 1])->
        asArray()->
        all();

       // $menu = ['label' => 'Головна', 'url' => ['/']];

        $pages  = array_map(function($pages) {
            return array(
            'label' => $pages ['title'],
            'url' => ['/blog/page', 'id' => $pages['id']] //'/blog/page?id='.$pages['id']//
            );  
        }, $pages );

       // array_push($menu, $pages);

        if(!Yii::$app->user->isGuest) {
             $comments = Comments::find()->where(['status' => 0])->count();
         array_push($pages, ['label' => 'Коментарі  ('.$comments.')', 'url' => ['/Admin/comment']]);
        }

        array_push($pages, 
        	 ['label' => 'Адміністративна панель', 'url' => ['/Admin']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Ввійти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Вийти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        );
       
        array_unshift($pages,  ['label' => 'Головна', 'url' => ['/']]);
		echo Nav::widget([
		'options' => ['class' => 'navbar-nav navbar-right'],
   		'items' =>  
                    $pages
		]);
        
        return Html::encode($ul);
    }
}