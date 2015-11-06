<?php

namespace app\controllers;

use Yii;
use app\models\State;
use app\models\StateSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper as help;

/**
 * StateController implements the CRUD actions for State model.
 */
class StateController extends Controller
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
     * Lists all State models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new StateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->query->orderBy('state_id desc');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single State model.
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
     * Creates a new State model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new State();
		$dateConvert=yii::$app->request->post();
        $dateConvert=help::datevolume($dateConvert,"date","create");
        if ($model->load($dateConvert) && $model->save()) {
			
			   $session = Yii::$app->session;
            $session['alert']=help::warnalert("Record has been created succesfully",1);
	  
            return $this->redirect(['index', 'id' => $model->state_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing State model.
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
            return $this->redirect(['index', 'id' => $model->state_id]);
        } else {
			$model=help::datevolume($model,"date","update");
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing State model.
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
     * Finds the State model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return State the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = State::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
