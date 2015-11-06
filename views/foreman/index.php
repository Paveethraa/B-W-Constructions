<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ForemanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Foremen';
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
      echo $session['alert'];
      unset(Yii::$app->session['alert']);
?>
<div class="foreman-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Foreman', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'foreman_id',
            'foreman_name',
            'driver',
            'person',
            'mobile',
            // 'email:email',
            // 'rating',
            // 'created_at',
            // 'created_by',
        ['class' => 'yii\grid\ActionColumn' ,'template' =>'{view}{update}'               ],
        ],
    ]); ?>

</div>
