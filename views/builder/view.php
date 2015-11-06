<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Builder */

$this->title = $model->builder_id;
$this->params['breadcrumbs'][] = ['label' => 'Builder', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="builder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->builder_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->builder_id], [
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
            'builder_id',
            'builder_name',
            'mobile',
            //'alt_mobile',
            'email:email',
            'address:ntext',
            'state.state_name',
            'city.city_name',
            //'created_at',
            //'created_by',
        ],
    ]) ?>

</div>
