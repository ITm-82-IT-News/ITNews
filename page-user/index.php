<?php
/* @var $this yii\web\View */

use app\modules\blog\widgets\SocialWidget;
?>
<h1><?= $page['title'] ?></h1>

<?= $post['created']; ?>

<p>Автор: <?= $author ?></p>

<?php if(isset($post['imgprev'])) {?>
<img src="/uploads/<?= $post['imgprev'] ?>" class="img-thumbnail">

<?php } ?>

<?= $post['text']; ?>

<?= SocialWidget::widget(); ?>
