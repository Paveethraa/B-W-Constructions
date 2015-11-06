<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Update User: ' . ' ' . $model->user_id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['user/']];
$this->params['breadcrumbs'][] = ['label' => $model->user_id, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="col-md-12">
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>
	<?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'user_role_id')->label('user_role_name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\UserRole::find()->orderBy('user_role_name')->asArray()->all(),'user_role_id','user_role_name')) ?><?= $form->field($model, 'created_date')->widget(DatePicker::className(),['name' => 'created_date']) ?>   



</div>
<div class="col-md-6">

<?php 
echo "<h2>User Access</h2>";
foreach($url as $var=>$val)
{
	foreach($urls as $var1=>$val1)
	{
	foreach($val1 as $val2)
	{
	
	@$sel=($val2==$val)?"checked":"";
	
		}
		if(@$sel=="checked")
	{
	break;
	}
	}
?>
<input type="checkbox" name="<?php echo $val;?>" value="<?php echo $var;?>"  <?php echo @$sel;?>><?php echo trim(str_replace("/","-",$val),"-");?>
<br>
<?php
	

}
 ?>

</div>
</div>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>