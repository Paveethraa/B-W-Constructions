<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JobSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jobs';
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
      echo $session['alert'];
      unset(Yii::$app->session['alert']);
?>
<div class="job-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Job', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'job_id',
            'job_name',
['attribute' =>'builder_id','value' =>'builder.builder_name','filter'=>yii\helpers\ArrayHelper::map(app\models\Builder::find()->orderBy('builder_name')->asArray()->all(),'builder_id','builder_name')],['attribute' =>'sub_division_id','value' =>'sub_division.sub_division_name','filter'=>yii\helpers\ArrayHelper::map(app\models\SubDivision::find()->orderBy('sub_division_name')->asArray()->all(),'sub_division_id','sub_division_name')],            'lot',
            'status',
            'comments:ntext',
            // 'created_at',
            // 'created_by',
        ['class' => 'yii\grid\ActionColumn','template' =>'{view}{update}'            ],
        ],
    ]); ?>

</div>
