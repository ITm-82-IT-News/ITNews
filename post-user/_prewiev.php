<?php
use yii\helpers\Url;
use app\modules\blog\widgets\MetaWidget;

?>
<div class="panel panel-primary item">
  <div class="panel-body">
  	<?php if(isset($post['imgprev'])) {?>
    <img src="/uploads/<?= $post['imgprev'] ?>" class="img-thumbnail">
<? } ?>
  <h1><?= $post['h1'] ?> <?= $page['title'] ?></h1>

  <p><?= substr($post['text'] ,0,30) ?></p>

  <p><?php if(isset($categories)) echo 'Категорія:'.$categories[$post['category']]["title"] ?></p>
  <?php echo  MetaWidget::widget(['id' => $post['id']]); ?>

  <p class="text-right">
    <?php if($post) {?>
  	<a class="btn btn-primary" href="<?= Url::to(['/blog/post', 'id' => $post['id']]); ?>
    " role="button">Перейти</a>
  <? } else {?>
  <a class="btn btn-primary" href="<?= Url::to(['/blog/page', 'id' => $page['id']]); ?>
    " role="button">Перейти</a>
  <? } ?>
  </p>
</div>
</div>