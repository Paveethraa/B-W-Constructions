<?php

namespace app\controllers;

use Yii;
use app\models\ConcreteSchedule;
use app\models\ConcreteScheduleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper as help;

/**
 * ConcreteScheduleController implements the CRUD actions for ConcreteSchedule model.
 */
class ConcreteScheduleController extends Controller
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
     * Lists all ConcreteSchedule models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ConcreteScheduleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->query->orderBy('concrete_schedule_id desc');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ConcreteSchedule model.
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
     * Creates a new ConcreteSchedule model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ConcreteSchedule();
		$dateConvert=yii::$app->request->post();

   $dateConvert=help::datevolume($dateConvert,"date","create");

        if ($model->load($dateConvert) && $model->save()) {
	
$ids=$dateConvert['ConcreteSchedule']['job_card_id'];	
 \Yii::$app->db->createCommand("UPDATE job_card set job_card_status='Billed' where job_card_id='$ids'")
->execute();
			   $session = Yii::$app->session;
            $session['alert']=help::warnalert("Record has been created succesfully",1);
	  
            return $this->redirect(['index', 'id' => $model->concrete_schedule_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ConcreteSchedule model.
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
            return $this->redirect(['index', 'id' => $model->concrete_schedule_id]);
        } else {
			$model=help::datevolume($model,"date","update");
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ConcreteSchedule model.
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
     * Finds the ConcreteSchedule model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ConcreteSchedule the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ConcreteSchedule::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
