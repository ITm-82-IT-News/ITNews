<?php

namespace app\modules\blog\controllers;

use app\models\Post;
use app\models\Page;
use app\models\PostMeta;
use app\models\Meta;

class SearchController extends \yii\web\Controller
{

public function actionMeta($q)
    { 
        $posts_meta = Post::find()->
        select('*')-> 
        leftJoin('cms_post_meta', '`cms_post_meta`.`post_id` = `cms_post`.`id`') ->      
        where(['`cms_post_meta`.`meta_id`' => $q])->
        asArray()->
        all();


    
            $meta = Meta::find()->
            where(['id' => $q])->
            asArray()->
            one();

            

              return $this->render('index',
              [
                'posts' => $posts_meta ,
                'pages' =>null,
                'q' => $q,
                'meta' => $meta 
             ]);
        
    }

    public function actionIndex($q)
    {   
        $posts = Post::find()
            ->where(['or',['like', 'h1', $q],['like', 'text', $q]])
            ->asArray()
            ->all();
         
        $pages = Page::find()
            ->where(['or', ['like', 'title', $q], ['like', 'content', $q]])
            ->asArray()
            ->all();


        return $this->render('index',
        	['posts' => $posts,
        	  'pages' => $pages,
              'q' => $q]);
    }

}
//->where(['or',['like', 'name_serial', $query],['like', 'description_serial', $query]])->limit(30)