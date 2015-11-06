<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ConcreteCompany */

$this->title = $model->concrete_company_id;
$this->params['breadcrumbs'][] = ['label' => 'Concrete Companies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="concrete-company-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->concrete_company_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->concrete_company_id], [
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
            'concrete_company_id',
            'concrete_company_name',
            'contact_person',
            'mobile',
            'alt_mobile',
            'email:email',
            'address:ntext',
            'state_id',
            'city_id',
          //  'created_at',
           // 'created_by',
        ],
    ]) ?>

</div>
