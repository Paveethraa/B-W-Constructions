<?php

namespace app\controllers;

use Yii;
use app\models\Job;
use app\models\JobSearch;
use app\models\SubDivision;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper as help;

/**
 * JobController implements the CRUD actions for Job model.
 */
class JobController extends Controller
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
     * Lists all Job models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new JobSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->query->orderBy('job_id desc');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Job model.
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
     * Creates a new Job model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Job();
		$dateConvert=yii::$app->request->post();
        $dateConvert=help::datevolume($dateConvert,"date","create");
        if ($model->load($dateConvert) && $model->save()) {
			
			   $session = Yii::$app->session;
            $session['alert']=help::warnalert("Record has been created succesfully",1);
	  
            return $this->redirect(['index', 'id' => $model->job_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

public function actionSub()
{
@$data=$_GET['data'];

$det=new SubDivision();
$result=$det::find()->select('sub_division_id,sub_division_name')->Where(['builder_id'=>$data])->asArray()->all();
@$var.="<option value='0'>-----Choose Sub Division-----</option>";
foreach($result as $res)
{
	@$var.="<option value=".$res['sub_division_id'].">".$res['sub_division_name']."</option>";

	
}
echo @$var;
}


    /**
     * Updates an existing Job model.
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
            return $this->redirect(['index', 'id' => $model->job_id]);
        } else {
			$model=help::datevolume($model,"date","update");
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Job model.
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
     * Finds the Job model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Job the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Job::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
