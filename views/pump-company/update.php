<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PumpCompany */

$this->title = 'Update Pump Company: ' . ' ' . $model->pump_company_id;
$this->params['breadcrumbs'][] = ['label' => 'Pump Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pump_company_id, 'url' => ['view', 'id' => $model->pump_company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pump-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
