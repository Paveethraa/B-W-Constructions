<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PumpCompany */

$this->title = 'Create Pump Company';
$this->params['breadcrumbs'][] = ['label' => 'Pump Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pump-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
