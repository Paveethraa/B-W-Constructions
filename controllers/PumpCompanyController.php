<?php

namespace app\controllers;

use Yii;
use app\models\PumpCompany;
use app\models\PumpCompanySearch;
use app\models\City;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper as help;

/**
 * PumpCompanyController implements the CRUD actions for PumpCompany model.
 */
class PumpCompanyController extends Controller
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
     * Lists all PumpCompany models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PumpCompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
$dataProvider->query->orderBy('pump_company_id desc');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
     * Displays a single PumpCompany model.
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
     * Creates a new PumpCompany model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PumpCompany();
		$dateConvert=yii::$app->request->post();
        $dateConvert=help::datevolume($dateConvert,"date","create");
        if ($model->load($dateConvert) && $model->save()) {
			
			   $session = Yii::$app->session;
            $session['alert']=help::warnalert("Record has been created succesfully",1);
	  
            return $this->redirect(['index', 'id' => $model->pump_company_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PumpCompany model.
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
            return $this->redirect(['index', 'id' => $model->pump_company_id]);
        } else {
			$model=help::datevolume($model,"date","update");
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PumpCompany model.
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
     * Finds the PumpCompany model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PumpCompany the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PumpCompany::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
