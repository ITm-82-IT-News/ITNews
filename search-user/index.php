<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
use app\modules\blog\widgets\SearchWidget;
?>
<h1>Пошук по запиту '<?= $q; ?>'</h1>

<?php
	if(isset($posts))
	{
		      foreach ($posts as $post) {
                               echo \Yii::$app->view->renderFile('@app/modules/blog/views/post/_prewiev.php', ['post' => $post, 'q' => $q]);       
                                }
	}?>

<?php 
if(isset($pages)) {
foreach ($pages as $page) {
                               echo \Yii::$app->view->renderFile('@app/modules/blog/views/post/_prewiev.php', ['page' => $page, 'q' => $q]);       
                                } }?>

 <?php
 if(count($posts) == 0 && count($pages)==0) {
?>
  <h1>Нічого не знайдено</h1>
  <?= SearchWidget::widget(); ?>
<?php } ?>
