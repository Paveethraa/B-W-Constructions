<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConcreteCompany */

$this->title = 'Update Concrete Company: ' . ' ' . $model->concrete_company_id;
$this->params['breadcrumbs'][] = ['label' => 'Concrete Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->concrete_company_id, 'url' => ['view', 'id' => $model->concrete_company_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="concrete-company-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
