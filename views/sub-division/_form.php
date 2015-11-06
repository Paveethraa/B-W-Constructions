<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\SubDivision */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-division-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='col-md-12'>
<div class='col-md-6'>
<div class='col-md-12'>    <?= $form->field($model, 'sub_division_name')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'><?= $form->field($model, 'builder_id')->label('builder_name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\Builder::find()->orderBy('builder_name')->asArray()->all(),'builder_id','builder_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'>    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'zip')->textInput(['maxlength' => true]) ?>

</div></div><div class='col-md-6'><div class='col-md-12'><?= $form->field($model, 'state_id')->label('State')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\State::find()->orderBy('state_name')->asArray()->all(),'state_id','state_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'><?= $form->field($model, 'city_id')->label('City')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\City::find()->orderBy('city_name')->asArray()->all(),'city_id','city_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'>    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>



</div></div></div>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
