<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JobCardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="job-card-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'job_card_id') ?>

    <?= $form->field($model, 'job_id') ?>

    <?= $form->field($model, 'foreman_id') ?>

    <?= $form->field($model, 'job_card_name') ?>

    <?= $form->field($model, 'task') ?>

    <?php // echo $form->field($model, 'date_pour') ?>

    <?php // echo $form->field($model, 'linear_feet_footing') ?>

    <?php // echo $form->field($model, 'yards_footing') ?>

    <?php // echo $form->field($model, 'brick') ?>

    <?php // echo $form->field($model, 'bulkheads') ?>

    <?php // echo $form->field($model, 'dowels') ?>

    <?php // echo $form->field($model, 'pier_pads') ?>

    <?php // echo $form->field($model, 'firepalace_pads') ?>

    <?php // echo $form->field($model, 'rebar_rf3') ?>

    <?php // echo $form->field($model, 'tied_rebar') ?>

    <?php // echo $form->field($model, 'pumped_by') ?>

    <?php // echo $form->field($model, 'calcium') ?>

    <?php // echo $form->field($model, 'plywood_rf3') ?>

    <?php // echo $form->field($model, 'pockets') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'job_card_status') ?>

    <?php // echo $form->field($model, 'completed_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
