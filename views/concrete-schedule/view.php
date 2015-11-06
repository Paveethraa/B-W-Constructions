<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ConcreteSchedule */

$this->title = $model->concrete_schedule_id;
$this->params['breadcrumbs'][] = ['label' => 'Concrete Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concrete-schedule-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->concrete_schedule_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->concrete_schedule_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'concrete_schedule_id',
            'concrete_schedule_name',
            'job_card_id',
            'concrete_company_id',
            'schedule_date',
            'yards_ordered',
            'pump_company_id',
            'total',
            'comments:ntext',
            'created_at',
            'created_by',
            'concrete_schedule_status',
        ],
    ]) ?>

</div>
