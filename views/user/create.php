<?php


use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'Create User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['user/']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-12">
<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-3">
<div class="col-md-12">
    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?></div><div class="col-md-12">
	<?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?></div><div class="col-md-12">
<?= $form->field($model, 'user_role_id')->label('user_role_name')->dropDownList(
			yii\helpers\ArrayHelper::map(app\models\UserRole::find()->orderBy('user_role_name')->asArray()->all(),'user_role_id','user_role_name')) ?></div><div class="col-md-12">
				<label class="control-label" for="user-created_date">Created Date</label>
<?php
echo DatePicker::widget([
    'id' =>'user-created_date',
	'class' => 'form-control',
    'name' => 'User[created_date]', 
    'value' => date('d-m-Y', strtotime("now")),
    'options' => ['placeholder' => 'Select issue date ...'],
    'pluginOptions' => [
        'format' => 'dd-mm-yyyy',
        'todayHighlight' => true
    ]
]); ?>

			</div></div> 



</div>

<center><h4> User Roles</h4></center><br>
<?php
$get=sizeof($url);


foreach($url as $vars=>$filter)
{
$sub=substr($filter,-1)	;
if($sub=="/")
{
	$parent[$vars]=$filter;
}
}

?>
<input type="hidden" class='count' value='<?php echo $get;?>'>

<?php
foreach($url as $urlp)
{
	foreach($parent as $parentby)
	{	
		if(strstr($urlp,$parentby))
		{
			if($urlp!=$parentby)
			{
			$sk[$parentby][]=$urlp;
		}
		}
		
	}
}
$i=0;
echo "<div class='col-md-3'>";
echo "<div class='col-md-12'>";
foreach($sk as $var=>$pose)
{
$i++;	
$ids=array_search($var,$url);
if($i%6==0)
{
	echo "</div></div><div class='col-md-3'><div class='col-md-12'>";

}
	
	?>
	<input  class='parent<?php echo $i; ?>' type="checkbox" onclick="hidess(<?php echo $i;?>)" name="<?php print_r($var);?>" value="<?php echo $ids;?>"><?php echo trim(str_replace("/","-",$var),"-");?>
	<?php
echo "<br>";
	?>
	<?php
	
	foreach($pose as $pieces)
	{
	
		$idss=array_search($pieces,$url);
		?>
		
		<div class="hide<?php echo $i;?> col-md-12">&nbsp&nbsp&nbsp&nbsp<input type="checkbox"  class="child<?php echo $i;?>" name="<?php print_r($pieces);?>" value="<?php echo $idss;?>"><?php echo trim(str_replace("/","-",$pieces),"-");?></div>
		<?php
	
	}
	
}

echo "</div></div></div>";
?>
<?php 
/*
echo "<h2>User Access</h2>";
foreach($url as $var=>$val)
{
?>
<input type="checkbox" name="<?php print_r($val);?>" value="<?php echo $var;?>"><?php echo trim(str_replace("/","-",$val),"-");?>
<br>
<?php
}

 ?>

</div>
</div>
<?php
*/
?>

    <div class="form-group col-md-12" onclick="roleadd()">
       <br> <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	</div>
</div>
	
	<script>	
var n = $(".count").val();
$(".hide").hide();

for(var i=0;i<n;i++)
{
	
	var hide=".hide"+i;
	$(hide).hide();	
}

function hidess(intValue)
{
	
var parent='.parent'+intValue;
var hide=".hide"+intValue;
var child=".child"+intValue;
	if($(parent).is(':checked'))
	{
	$(child).prop('checked', true);
	$(hide).show();
	}
	else
	{
	$(child).prop('checked', false);
    $(hide).hide();
	}
	
$(show).toggle();
}
function roleadd()
{
	var value = $("[name='site/index']");
		var value1 = $("[name='site/login']");
value1.prop('checked',true);
value.prop('checked',true);
}

	</script>