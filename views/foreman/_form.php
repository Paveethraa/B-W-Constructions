<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Foreman */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="foreman-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='col-md-12'>
<div class='col-md-6'>
<div class='col-md-12'>    <?= $form->field($model, 'foreman_name')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'driver')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'person')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

</div></div><div class='col-md-6'><div class='col-md-12'>    <?= $form->field($model, 'rating')->textInput() ?>

</div></div></div>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
