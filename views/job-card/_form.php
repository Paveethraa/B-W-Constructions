<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\JobCard */
/* @var $form yii\widgets\ActiveForm */
$val=app\models\JobCard::find()->orderby(['job_card_id' => SORT_DESC])->asArray()->one();
$aps=$val['job_card_id']+1;

	$mons = array(1 => "JAN", 2 => "FEB", 3 => "MAR", 4 => "APR", 5 => "MAY", 6 => "JUN", 7 => "JUL", 8 => "AUG", 9 => "SEP", 10 => "OCT", 11 => "NOV", 12 => "DEC");

$date = getdate();
$month = $date['mon'];

$mon = $mons[$month];

$jobno="JOBCARD".$mon."-".$aps;
?>

<div class="job-card-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='col-md-12'>
<div class='col-md-6'>
<div class='col-md-12'><?= $form->field($model, 'job_id')->label('Job Name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\Job::find()->orderBy('job_name')->asArray()->all(),'job_id','job_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'><?= $form->field($model, 'foreman_id')->label('Foreman Name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\Foreman::find()->orderBy('foreman_name')->asArray()->all(),'foreman_id','foreman_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'>    <?= $form->field($model, 'job_card_name')->label('Job Card Id')->textInput(array('value'=>$jobno,'readonly' => true)) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'task')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>  
<?= $form->field($model, 'date_pour')->widget(DatePicker::className(),['name' => 'last_bop_test_date']) ?>   

</div><div class='col-md-12'>    <?= $form->field($model, 'linear_feet_footing')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'yards_footing')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'brick')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'bulkheads')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'dowels')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'pier_pads')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'firepalace_pads')->textInput(['maxlength' => true]) ?>

</div></div><div class='col-md-6'><div class='col-md-12'>    <?= $form->field($model, 'rebar_rf3')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'tied_rebar')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'pumped_by')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'calcium')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'plywood_rf3')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'pockets')->textInput(['maxlength' => true]) ?>

</div><div class='col-md-12'>   <div class='col-md-12'>    <?= $form->field($model, 'job_card_status')->dropDownlist(['not started'=>'Not started','completed'=>'Completed','pending'=>'Pending','started'=>'Started']) ?>

</div><div class='col-md-12'><?= $form->field($model, 'completed_at')->widget(DatePicker::className(),['name' => 'last_bop_test_date']) ?>   

</div></div></div>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
