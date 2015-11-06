<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConcreteScheduleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="concrete-schedule-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'concrete_schedule_id') ?>

    <?= $form->field($model, 'concrete_schedule_name') ?>

    <?= $form->field($model, 'job_card_id') ?>

    <?= $form->field($model, 'concrete_company_id') ?>

    <?= $form->field($model, 'schedule_date') ?>

    <?php // echo $form->field($model, 'yards_ordered') ?>

    <?php // echo $form->field($model, 'pump_company_id') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'concrete_schedule_status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
