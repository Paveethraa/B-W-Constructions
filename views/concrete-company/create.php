<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ConcreteCompany */

$this->title = 'Create Concrete Company';
$this->params['breadcrumbs'][] = ['label' => 'Concrete Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concrete-company-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
