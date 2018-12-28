<?php

use yii\helpers\Html;

use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\Comments */

$this->title = 'Обновить коментарий: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Коментарии', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comments-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>


<h2>Ответить на коментарий</h2>
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
</div>
