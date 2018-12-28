<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Post */

$this->title = 'Обновление поста: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="post-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

     <?php
     $form = ActiveForm::begin([
        'id' => 'comments-form',
        'options' => ['class' => 'form-horizontal'],
     ]) ;
	
	  echo $form->field($postmeta, 'meta_id[]')->checkboxList($meta);
     //meta
    ?>
  
     <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Сохранить метку', ['class' => 'btn btn-primary']) ?>
        </div>
      </div>
    <?php ActiveForm::end() ?>

</div>
