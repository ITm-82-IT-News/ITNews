<?php

namespace app\modules\blog\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Page;
use yii\helpers\Url;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;

class SearchWidget extends Widget
{
    public $message;

    public function init()
    {
      
    }

    public function run()
    {    	
      $q = '  			
    <form class="" role="search" action="/blog/search" method="get">
   
    <input type="text" class="form-control form-control-sm" name="q" placeholder="Пошук">
 
  <button class="btn btn-primary" type="submit">
            <span class="glyphicon glyphicon-search"></span>
          </button>
</form>';

		return $q;
    }
}