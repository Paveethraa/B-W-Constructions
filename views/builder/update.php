<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Builder */

$this->title = 'Update Builder: ' . ' ' . $model->builder_id;
$this->params['breadcrumbs'][] = ['label' => 'Builders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->builder_id, 'url' => ['view', 'id' => $model->builder_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="builder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
