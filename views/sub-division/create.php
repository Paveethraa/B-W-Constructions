<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SubDivision */

$this->title = 'Create Sub Division';
$this->params['breadcrumbs'][] = ['label' => 'Sub Divisions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-division-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
