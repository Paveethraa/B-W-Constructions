<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Job */
/* @var $form yii\widgets\ActiveForm */
$val=app\models\Job::find()->orderby(['job_id' => SORT_DESC])->asArray()->one();
$aps=$val['job_id']+1;

	$mons = array(1 => "JAN", 2 => "FEB", 3 => "MAR", 4 => "APR", 5 => "MAY", 6 => "JUN", 7 => "JUL", 8 => "AUG", 9 => "SEP", 10 => "OCT", 11 => "NOV", 12 => "DEC");

$date = getdate();
$month = $date['mon'];

$mon = $mons[$month];

$jobno="JOB".$mon."-".$aps;
	?>
<div class="job-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='col-md-12'>
<div class='col-md-6'>
<div class='col-md-12'>    <?= $form->field($model, 'job_name')->label('Job Id')->textInput(array('value'=>$jobno,'readonly' => true)) ?>

</div><div class='col-md-12'><?= $form->field($model, 'builder_id')->label('Builder Name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\Builder::find()->orderBy('builder_name')->asArray()->all(),'builder_id','builder_name'),array(
        'prompt' => '--Select a Type Name--' ,'onchange'=>'subdiv()'))?></div><div class='col-md-12'><?= $form->field($model, 'sub_division_id')->label('Sub Division Name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\SubDivision::find()->orderBy('sub_division_name')->asArray()->all(),'sub_division_id','sub_division_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'>    <?= $form->field($model, 'lot')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

</div></div><div class='col-md-6'><div class='col-md-12'>    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

</div>

</div>

</div></div></div>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
function subdiv()
{

	var get=$("#job-builder_id").val();


	
	 $.ajax({    //create an ajax request to load_page.php
        type: "GET",
        url: "?r=job/sub",             
       data: {data:get},               
        success: function(response){                    
       
	
			 x=$("#job-sub_division_id").html(response);	
		}

    });
}
</script>
