<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JobCard */

$this->title = $model->job_card_id;
$this->params['breadcrumbs'][] = ['label' => 'Job Cards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="job-card-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->job_card_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->job_card_id], [
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
            'job_card_id',
            'job_id',
            'foreman_id',
            'job_card_name',
            'task',
            'date_pour',
            'linear_feet_footing',
            'yards_footing',
            'brick',
            'bulkheads',
            'dowels',
            'pier_pads',
            'firepalace_pads',
            'rebar_rf3',
            'tied_rebar',
            'pumped_by',
            'calcium',
            'plywood_rf3',
            'pockets',
            
            'job_card_status',
            'completed_at',
        ],
    ]) ?>

</div>
