<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConcreteScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Concrete Schedules';
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
      echo $session['alert'];
      unset(Yii::$app->session['alert']);
?>
<div class="concrete-schedule-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Concrete Schedule', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'concrete_schedule_id',
            'concrete_schedule_name',
['attribute' =>'job_card_id','value' =>'job_card.job_card_name','filter'=>yii\helpers\ArrayHelper::map(app\models\JobCard::find()->orderBy('job_card_name')->asArray()->all(),'job_card_id','job_card_name')],['attribute' =>'concrete_company_id','value' =>'concrete_company.concrete_company_name','filter'=>yii\helpers\ArrayHelper::map(app\models\ConcreteCompany::find()->orderBy('concrete_company_name')->asArray()->all(),'concrete_company_id','concrete_company_name')],            'schedule_date',
            'yards_ordered',
['attribute' =>'pump_company_id','value' =>'pump_company.pump_company_name','filter'=>yii\helpers\ArrayHelper::map(app\models\PumpCompany::find()->orderBy('pump_company_name')->asArray()->all(),'pump_company_id','pump_company_name')],            'total',
            // 'comments:ntext',
            // 'created_at',
            // 'created_by',
            // 'concrete_schedule_status',
        ['class' => 'yii\grid\ActionColumn'            ],
        ],
    ]); ?>

</div>
