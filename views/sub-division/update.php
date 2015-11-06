<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubDivision */

$this->title = 'Update Sub Division: ' . ' ' . $model->sub_division_id;
$this->params['breadcrumbs'][] = ['label' => 'Sub Divisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->sub_division_id, 'url' => ['view', 'id' => $model->sub_division_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-division-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
