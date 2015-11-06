<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PumpCompany */

$this->title = $model->pump_company_id;
$this->params['breadcrumbs'][] = ['label' => 'Pump Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pump-company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pump_company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pump_company_id], [
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
            'pump_company_id',
            'pump_company_name',
            'contact_person',
            'mobile',
            'alt_mobile',
            'email:email',
            'address',
            'state_id',
            'city_id',
            
        ],
    ]) ?>

</div>
