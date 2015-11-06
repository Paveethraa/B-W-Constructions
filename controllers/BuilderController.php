<?php

namespace app\controllers;

use Yii;
use app\models\Builder;
use app\models\BuilderSearch;
use app\models\City;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper as help;

/**
 * BuilderController implements the CRUD actions for Builder model.
 */
class BuilderController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Builder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BuilderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->query->orderBy('builder_id desc');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Builder model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Builder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Builder();
		$dateConvert=yii::$app->request->post();
        $dateConvert=help::datevolume($dateConvert,"date","create");
        if ($model->load($dateConvert) && $model->save()) {
			
			   $session = Yii::$app->session;
            $session['alert']=help::warnalert("Record has been created succesfully",1);
	  
            return $this->redirect(['index', 'id' => $model->builder_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Builder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
		if($dateConvert=yii::$app->request->post())
		{
			 $dateConvert=help::datevolume($dateConvert,"date","create");
		}
		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			  $session = Yii::$app->session;
            $session['alert']=help::warnalert("Record has been updated succesfully",1);
            return $this->redirect(['index', 'id' => $model->builder_id]);
        } else {
			$model=help::datevolume($model,"date","update");
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
public function actionSub()
    {
     @$data=$_GET['data'];

$det=new City();
$result=$det::find()->select('city_id,city_name')->Where(['state_id'=>$data])->asArray()->all();
@$var.="<option value='0'>--Select a City--</option>";
foreach($result as $res)
{
	@$var.="<option value=".$res['city_id'].">".$res['city_name']."</option>";

	
}
echo @$var;
}
    /**
     * Deletes an existing Builder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
             $session = Yii::$app->session;
            $session['alert']=help::warnalert("Record has been deleted succesfully",1);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Builder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Builder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Builder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
