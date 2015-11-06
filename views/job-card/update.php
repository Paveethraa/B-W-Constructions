<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JobCard */

$this->title = 'Update Job Card: ' . ' ' . $model->job_card_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->job_card_id, 'url' => ['view', 'id' => $model->job_card_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-card-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
