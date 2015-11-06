<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
	
<?= $form->field($model, 'user_role_id')->label('user_role_name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\Userrole::find()->orderBy('user_role_name')->asArray()->all(),'user_role_id','user_role_name')) ?><?= $form->field($model, 'created_date')->widget(DatePicker::className(),['name' => 'created_date']) ?>    <?= $form->field($model, 'created_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
