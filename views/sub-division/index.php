<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SubDivisionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Divisions';
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
      echo $session['alert'];
      unset(Yii::$app->session['alert']);
?>
<div class="sub-division-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Sub Division', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'sub_division_id',
            'sub_division_name',
['attribute' =>'builder_id','value' =>'builder.builder_name','filter'=>yii\helpers\ArrayHelper::map(app\models\Builder::find()->orderBy('builder_name')->asArray()->all(),'builder_id','builder_name')],            'contact_person',
            'phone',
            'address:ntext',
            // 'zip',
['attribute' =>'state_id','value' =>'state.state_name','filter'=>yii\helpers\ArrayHelper::map(app\models\State::find()->orderBy('state_name')->asArray()->all(),'state_id','state_name')],['attribute' =>'city_id','value' =>'city.city_name','filter'=>yii\helpers\ArrayHelper::map(app\models\City::find()->orderBy('city_name')->asArray()->all(),'city_id','city_name')],            // 'comments:ntext',
             //'created_at:datetime',
            // 'created_by',
        ['class' => 'yii\grid\ActionColumn','template' =>'{view}{update}'              ],
        ],
    ]); ?>

</div>
