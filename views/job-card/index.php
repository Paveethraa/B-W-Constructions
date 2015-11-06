<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobCardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Job Cards';
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
      echo $session['alert'];
      unset(Yii::$app->session['alert']);
?>
<div class="job-card-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Job Card', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'job_card_id',
['attribute' =>'job_id','value' =>'job.job_name','filter'=>yii\helpers\ArrayHelper::map(app\models\Job::find()->orderBy('job_name')->asArray()->all(),'job_id','job_name')],['attribute' =>'foreman_id','value' =>'foreman.foreman_name','filter'=>yii\helpers\ArrayHelper::map(app\models\Foreman::find()->orderBy('foreman_name')->asArray()->all(),'foreman_id','foreman_name')],            'job_card_name',
           // 'task',
           // 'date_pour',
           // 'linear_feet_footing',
            // 'yards_footing',
            // 'brick',
            // 'bulkheads',
            // 'dowels',
            // 'pier_pads',
            // 'firepalace_pads',
            // 'rebar_rf3',
            // 'tied_rebar',
            // 'pumped_by',
            // 'calcium',
            // 'plywood_rf3',
            // 'pockets',
            // 'created_at',
            // 'created_by',
             'job_card_status',
            // 'completed_at',
        ['class' => 'yii\grid\ActionColumn'   ,'template' =>'{view}{update}'             ],
        ],
    ]); ?>

</div>
