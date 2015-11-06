<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='col-md-12'>
<div class='col-md-6'>
<div class='col-md-12'><?= $form->field($model, 'state_id')->label('state_name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\State::find()->orderBy('state_name')->asArray()->all(),'state_id','state_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'>    <?= $form->field($model, 'city_name')->textInput(['maxlength' => true]) ?>

</div></div><div class='col-md-6'><div class='col-md-12'>    <?= $form->field($model, 'flag')->textInput() ?>

</div></div></div>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
