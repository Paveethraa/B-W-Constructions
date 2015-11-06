<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\ConcreteSchedule */
/* @var $form yii\widgets\ActiveForm */
$val=app\models\ConcreteSchedule::find()->orderby(['concrete_schedule_id' => SORT_DESC])->asArray()->one();
$aps=$val['concrete_schedule_id']+1;

	$mons = array(1 => "JAN", 2 => "FEB", 3 => "MAR", 4 => "APR", 5 => "MAY", 6 => "JUN", 7 => "JUL", 8 => "AUG", 9 => "SEP", 10 => "OCT", 11 => "NOV", 12 => "DEC");

$date = getdate();
$month = $date['mon'];

$mon = $mons[$month];

$jobno="CONCRETE".$mon."-".$aps;
?>

<div class="concrete-schedule-form">

    <?php $form = ActiveForm::begin(); ?>
<div class='col-md-12'>
<div class='col-md-6'>

<div class='col-md-12'>    <?= $form->field($model, 'concrete_schedule_name')->label('Concrete Schedule Id')->textInput(array('value'=>$jobno,'readonly' => true)) ?>

</div><div class='col-md-12'><?= $form->field($model, 'job_card_id')->label('Job Card Name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\JobCard::find()->joinwith('concreteSchedules')->orderBy('job_card_name')->where(['job_card.job_card_status'=>'completed'])->asArray()->all(),'job_card_id','job_card_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'><?= $form->field($model, 'concrete_company_id')->label('Concrete Company Name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\ConcreteCompany::find()->orderBy('concrete_company_name')->asArray()->all(),'concrete_company_id','concrete_company_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div><div class='col-md-12'><?= $form->field($model, 'schedule_date')->widget(DatePicker::className(),['name' => 'schedule_date']) ?></div><div class='col-md-12'>    <?= $form->field($model, 'yards_ordered')->textInput() ?>

</div><div class='col-md-12'><?= $form->field($model, 'pump_company_id')->label('Pump Company Name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\PumpCompany::find()->orderBy('pump_company_name')->asArray()->all(),'pump_company_id','pump_company_name'),array(
        'prompt' => '--Select a Type Name--' ))?></div></div><div class='col-md-6'><div class='col-md-12'>    <?= $form->field($model, 'total')->textInput() ?>

</div><div class='col-md-12'>    <?= $form->field($model, 'comments')->textarea(['rows' => 6]) ?>

</div><div class='col-md-12'>    

</div><div class='col-md-12'>   

</div><div class='col-md-12'>    <?= $form->field($model, 'concrete_schedule_status')->dropdownlist(['Paid'=>'Paid','Not Paid'=>'Not Paid','Pending'=>'Pending']) ?>

</div></div></div>    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
