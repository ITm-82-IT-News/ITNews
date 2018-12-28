<?php
/* @var $this yii\web\View */

	use yii\helpers\Html;
	use yii\widgets\ActiveForm;
	use dosamigos\ckeditor\CKEditor;
  use app\modules\blog\widgets\SocialWidget;
?>
<h1><?= $post['h1']; ?></h1>


<?= $post['datestamp'] ?>

<p>Автор: <?= $author ?></p>

<?php if(isset($post['imgprev'])) {?>
<img src="/uploads/<?= $post['imgprev'] ?>" class="img-thumbnail">

<?php } ?>
<?= $post['text']; ?>






<h2>Коментарі</h2>

<?php
	$form = ActiveForm::begin([
   	 'id' => 'comments-form',
    	'options' => ['class' => 'form-horizontal'],
	]) ;
?>
   <?= $form->field($comment, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Отправить коментарий', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>

<?php
	if(isset($comments))
	{
		foreach ($comments as $key => $entryComment) {
			echo '<p>'.$entryComment['content'].'</p>';
		}
	}
?>

<?= SocialWidget::widget(); ?>
