<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\PumpCompany */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pump-company-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='col-md-12'>
<div class='col-md-6'>
<div class='col-md-12'>    <?= $form->field($model, 'pump_company_name')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'alt_mobile')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

</div></div><div class='col-md-6'><div class='col-md-12'><?= $form->field($model, 'state_id')->label('State')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\State::find()->orderBy('state_name')->asArray()->all(),'state_id','state_name'),array(
        'prompt' => '--Select a State--','onchange'=>'city()' ))?></div><div class='col-md-12'><?= $form->field($model, 'city_id')->label('City')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\City::find()->orderBy('city_name')->asArray()->all(),'city_id','city_name'),array(
        'prompt' => '--Select a City--' ))?></div><div class='col-md-12'>    </div></div>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
function city()
{

	var r=$("#pumpcompany-state_id").val();

	$.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "?r=pump-company/sub",             
       data: {data:r},               
        success: function(response){                    
       
	
			 x=$("#pumpcompany-city_id").html(response);	
		}

    });
}
</script>
