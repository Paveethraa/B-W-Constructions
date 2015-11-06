<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ConcreteSchedule */

$this->title = 'Create Concrete Schedule';
$this->params['breadcrumbs'][] = ['label' => 'Concrete Schedules', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concrete-schedule-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
