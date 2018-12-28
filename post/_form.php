<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\CategorySearch;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>
<?php  var_dump($category); ?>
<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php // $form->field($model, 'id')->textInput() ?>
<div class="row">
    <div class="col-md-6">
        <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-6">
        <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    </div>
</div>
    

    <?= $form->field($model, 'text')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?php
        $category =
        yii\helpers\ArrayHelper::map(Category::find()->all(), 'id', 'title');
        // Category::find()->select(['title'])->asArray()->all();
        echo $form->field($model, 'category')->dropDownList($category);
    ?>

     <?= $form->field($model, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
