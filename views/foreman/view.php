<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Foreman */

$this->title = $model->foreman_id;
$this->params['breadcrumbs'][] = ['label' => 'Foremen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="foreman-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->foreman_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->foreman_id], [
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
            'foreman_id',
            'foreman_name',
            'driver',
            'person',
            'mobile',
            'email:email',
            'rating',
           
        ],
    ]) ?>

</div>
