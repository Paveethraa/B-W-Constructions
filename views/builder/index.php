<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BuilderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Builder';
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
      echo $session['alert'];
      unset(Yii::$app->session['alert']);
?>
<div class="builder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Builder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'builder_id',
            'builder_name',
            'mobile',
            //'alt_mobile',
            'email:email',
            // 'address:ntext',
['attribute' =>'state_id','value' =>'state.state_name','filter'=>yii\helpers\ArrayHelper::map(app\models\State::find()->orderBy('state_name')->asArray()->all(),'state_id','state_name')],

['attribute' =>'city_id','value' =>'city.city_name','filter'=>yii\helpers\ArrayHelper::map(app\models\City::find()->orderBy('city_name')->asArray()->all(),'city_id','city_name')],           
//'created_at:datetime',
          
        ['class' => 'yii\grid\ActionColumn','template' =>'{view}{update}'            ],
        ],
    ]); ?>

</div>
