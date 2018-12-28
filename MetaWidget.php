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
use app\models\PostMeta;

class MetaWidget extends Widget
{
    public $id;

    public function init()
    {
        parent::init();
       
    }

    public function run()
    {  
 
      $postcats = PostMeta::find()->
        select('*')->        
        leftJoin('cms_meta', '`cms_meta`.`id` = `cms_post_meta`.`meta_id`')->
        where(['post_id' => $this->id])->
        asArray()->
        all();

      if(isset($postcats)) 
         {
         echo 'Мітки :';
         foreach ($postcats as $postcat) 
         {
        echo $postcat["title"].' ';  
         } 
         }
    }
}