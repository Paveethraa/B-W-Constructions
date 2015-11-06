<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();

echo "<?php\n";
?>

use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "yii\\grid\\GridView" : "yii\\widgets\\ListView" ?>;

/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString(Inflector::pluralize(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;

$session = Yii::$app->session;
      echo $session['alert'];
      unset(Yii::$app->session['alert']);
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>
<?php if(!empty($generator->searchModelClass)): ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>

    <p>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Create ' . Inflector::camel2words(StringHelper::basename($generator->modelClass))) ?>, ['create'], ['class' => 'btn btn-success']) ?>
    </p>

<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => [\n" : "'columns' => [\n"; ?>
            ['class' => 'yii\grid\SerialColumn'],

<?php
$count = 0;

if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {

/*if(strstr($name,"_id"))
{
echo "['attribute =>'".$name."'";
echo "['value =>'".trim($name,"_id").".".trim($name,"_id")."_name";	
}*/
	
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            // '" . $name . "',\n";
        }
    
	}
} else {
	$ins=0;
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
	
		if(strstr($column->name,"_id") and $ins!=0)
{
	
$gMod=ucfirst(trim($column->name,'_id'));
$gMod=str_replace("_","",$gMod);
	echo "['attribute' =>'".$column->name."'";
echo ",'value' =>'".trim($column->name,'_id').".".trim($column->name,'_id')."_name',";	
 echo "'filter'=>yii\helpers\ArrayHelper::map(app\models\\".$gMod."::find()->orderBy('".trim($column->name,'_id')."_name')->asArray()->all(),'".$column->name."','".trim($column->name,'_id')."_name')],";

}

else if(strstr($column->name,"datesss"))
{		echo "[
            'attribute' => '".$column->name."',
            
            'filter' => DatePicker::widget(['name' => '".$column->name."','value' => date('20y-m-d', strtotime('+2 days')),'options' => ['placeholder' => ''],'pluginOptions' => [
        'format' => 'yyyy-mm-d',
        'todayHighlight' => false
    ]])],";
}
		else{
		
		
        if (++$count < 6) {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        } else {
            echo "            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }}
		$ins++;
		}
    
}
?>
        <?php
		$col="['class' => 'yii\grid\ActionColumn'";
		$mode=yii::$app->session['mode'];
		if(!empty($mode))
		{
		$merge=",'template' =>";
		$merge .="'{".implode("}{",$mode)."}'";
		
		$col.=$merge;
		}
		echo $col;
		?>
            ],
        ],
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>

</div>
