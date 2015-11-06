<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SubDivision */

$this->title = $model->sub_division_id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Divisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-division-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sub_division_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sub_division_id], [
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
            'sub_division_id',
            'sub_division_name',
            'builder_id',
            'contact_person',
            'phone',
            'address:ntext',
            'zip',
            'state.state_name',
            'city.city_name',
            'comments:ntext',
           //'created_at:datetime',
            //'created_by',
        ],
    ]) ?>

</div>
