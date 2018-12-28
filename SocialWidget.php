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

class SocialWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        
    }

    public function run()
    {    	
       $script = "<script type='text/javascript'>(function() {
  if (window.pluso)if (typeof window.pluso.start == 'function') return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div class='pluso' data-background='transparent' data-options='medium,round,line,horizontal,counter,theme=01' data-services='facebook,twitter,google,email,print'></div>";
        return $script;
    }
}