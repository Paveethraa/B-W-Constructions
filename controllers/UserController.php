<?php

namespace app\controllers;

use Yii;
use app\models\UserAccess;
use app\models\Url;
use app\models\User;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\db\Query;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $model2=new Url();

		
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
           
		   $var=yii::$app->request->post();
		   foreach($var as $a=>$b)
		   {
		  if(strstr($a,"/"))
		  {
		$round[]="(".$model->user_id.",".$b.")";
		}
		   }
		   $ids=implode($round,",");
		 
		   $model->ids=$ids;
		   $model->insertRoles();
		  
		   
		    $session = Yii::$app->session;
		return $this->redirect(['user/', 'page' =>$session['page']]);
        } else {
				$url=\yii\helpers\ArrayHelper::map($model2->find()->asArray()->all(),'url_id','url_name');
            return $this->render('create', [
                'model' => $model,
				'url' =>$url,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
	$model2=new Url();
	$url=\yii\helpers\ArrayHelper::map($model2->find()->asArray()->all(),'url_id','url_name');
        $model = $this->findModel($id);
   
		

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
			
			
			
			
			
		UserAccess::deleteAll('user_id = :id', [':id' => $id]);
	$var=Yii::$app->request->post();
	  foreach($var as $a=>$b)
		   {
		  if(strstr($a,"/"))
		  {
		$round[]="(".$id.",".$b.")";
		}
		   }
		   $ids=implode($round,",");
		
		 
		   $model->ids=$ids;
		   $model->insertRoles();


           $session = Yii::$app->session;
		return $this->redirect(['user/', 'page' =>$session['page']]);
        } else {
		
		 $query =new Query();
		$query->select(['url_name'])->where(['user_id'=>$id])->from('user_access')->leftJoin('url','url.url_id=user_access.url_id');
		$sk=$query->createCommand();
		$urls=$sk->queryAll();
		
            return $this->render('update', [
                'model' => $model,
				'url' =>$url,'urls'=>$urls,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        $session = Yii::$app->session;
		return $this->redirect(['user/', 'page' =>$session['page']]);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
