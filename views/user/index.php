<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper as help;
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
	<?php
	if(help::checkUrl("user/create"))
	{
		?>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
		<?php
	}
	?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'user_id',
            'user_name',
            'password',
['attribute' =>'user_role_id',
'value' =>'user_role.user_role_name',
'filter'=>yii\helpers\ArrayHelper::map(app\models\UserRole::find()->orderBy('user_role_name')->asArray()->all(),'user_role_id','user_role_name')],
'created_date',
           
        ['class' => 'yii\grid\ActionColumn','template' =>'{view}{update}{delete}'            ],
        ],
    ]); ?>

</div>
