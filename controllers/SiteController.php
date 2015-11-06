<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ItemDetails;
use kartik\mpdf\Pdf;
use yii\helpers\Html;
use mPDF;
use app\models\User;
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

   public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new User();
		$session=yii::$app->session;
        if ($model->load(Yii::$app->request->post())) {
		  $data=$model->verify();
		  if($data)
		  {
			
		$session['auth']=$data;
		return $this->render('index', [
            'model' => $model,
        ]);
        }
		else
		{  
	$model = new User();
	 $url['url_name'][]="site/login";
	 $model->url=$url;
$session['auth']=$model;


			}
		}
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLog()
    {
	$model = new User();
    	$session=yii::$app->session;
	  unset($session['auth']);
	   return $this->render('login', [
            'model' => $model,
        ]);
    }

		 public function beforeAction($action) {
    $this->enableCsrfValidation = false;
    return parent::beforeAction($action);
}
	
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
	

 public function actionGensetavail()
    {
        return $this->render('gensetavail');
    }

public function actionReport($id) {
    // get your HTML raw content without any layouts or scripts
	$session = Yii::$app->session;
    $id=$session['pdf'];

	$id = utf8_decode($id);
 
   $content = $id;
  
    
    // setup kartik\mpdf\Pdf component
    $pdf = new Pdf([
        // set to use core fonts only
       
        // A4 paper format
        'format' => Pdf::FORMAT_A4, 
        // portrait orientation
        'orientation' => Pdf::ORIENT_PORTRAIT, 
        // stream to browser inline
        'destination' => Pdf::DEST_BROWSER, 
        // your html content input
        'content' => $id,  
        // format content from your own css file if needed or use the
        // enhanced bootstrap css built by Krajee for mPDF formatting 
        'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
        // any css to be embedded if required
        'cssInline' => '.kv-heading-1{font-size:18px}', 
         // set mPDF properties on the fly
        'options' => ['title' => 'Vendor Wise Report'],
         // call mPDF methods on the fly
        'methods' => [ 
            'SetHeader'=>['Ranga Electricals Pvt. Ltd.'], 
            'SetFooter'=>['{PAGENO}'],
        ]
    ]);
     
    // return the pdf output as per the destination setting
    return $pdf->render('index'); 
}
	
	
	public function actionReportbalance()
	{
		if(yii::$app->request->post())
		{
				$get=yii::$app->request->post();		
		$subtype=$get['subtype'];
		@$type=$get['type'];
		$part=$get['part'];
		
		echo $from=$get['date_from'];
		echo $to=$get['date_to'];
		if($part!="CHOOSE PART NO")
		{
		$rate=new ItemDetails();
		$s=$rate->find()->select('item_price')->where(['item_details_id'=>$part])->asArray()->all();
		
		$where="Where date between".$from ."to".$to;
		
	$command=\Yii::$app->db->createCommand("select a.purchase_invoice_no,a.purchase_invoice_date,d.initial_stock,a.purchase_status,a.purchase_order_no,c.vendor_name,a.purchase_order_date,e.item_type_name,f.item_subtype_name,g.item_part_no,d.purchase_items_qty,d.purchase_items_unitprice,d.purchase_items_totalprice from purchase_order as a left join  vendor_details as c on a.purchase_vendor_id=c.vendor_id left join purchase_items as d on d.purchase_order_id=a.purchase_order_id left join item_type e on e.item_type_id=d.purchase_items_type left join item_sub_type f on f.item_subtype_id=d.purchase_items_subtype left join item_details as g on g.item_details_id=d.purchase_items_partno where d.purchase_items_partno=$part");
		  $post = $command->queryall();
		 foreach($post as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als[$pot][]=$pets;	
			}
		}
		  return $this->render('balace' ,['model' => @$als,'s'=>$s]);
		}
		}
		  return $this->render('balace');
	}
	
	public function actionReportvendor()
	{
		if(yii::$app->request->post())
		{
				$get=yii::$app->request->post();		
		$vendor=$get['vendor'];
		if($vendor!="CHOOSE VENDOR")
		{
		//$from=$get['from_date'];
		//$to=$get['to_date'];
		$rate=new ItemDetails();
		//$s=$rate->find()->select('item_price')->where(['item_details_id'=>$part])->asArray()->all();
	$command=\Yii::$app->db->createCommand("select a.purchase_invoice_no,a.purchase_invoice_date,d.initial_stock,a.purchase_status,a.purchase_order_no,c.vendor_name,a.purchase_order_date,e.item_type_name,f.item_subtype_name,g.item_part_no,d.purchase_items_qty,d.purchase_items_unitprice,d.purchase_items_totalprice from purchase_order as a left join  vendor_details as c on a.purchase_vendor_id=c.vendor_id left join purchase_items as d on d.purchase_order_id=a.purchase_order_id left join item_type e on e.item_type_id=d.purchase_items_type left join item_sub_type f on f.item_subtype_id=d.purchase_items_subtype left join item_details as g on g.item_details_id=d.purchase_items_partno where purchase_vendor_id=$vendor");
		  $post = $command->queryall();
		 foreach($post as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als[$pot][]=$pets;	
			}
		}
		  return $this->render('vendor' ,['model' => @$als]);
		}
		}
		  return $this->render('vendor');
	}
	
	
	public function actionReportbalances()
	{
		if(yii::$app->request->post())
		{
	    $get=yii::$app->request->post();		
		$subtype=$get['subtype'];
		@$type=$get['type'];
		$part=$get['part'];
		
		
		if($part!="")
		{
		
		//$from=$get['from_date'];
		//$to=$get['to_date'];
		$rate=new ItemDetails();
		$s=$rate->find()->select('item_price')->where(['item_details_id'=>$part])->asArray()->all();
	    $command=\Yii::$app->db->createCommand("select i.kva_type_name,d.initial_stock,a.sales_order_id,c.customer_name,a.sales_date,e.item_type_name,f.item_subtype_name,g.item_part_no,d.sales_item_qty,d.sales_item_unit_price,d.sales_item_total_price,h.generator_code from sales_order as a left join customer_details as c on a.sales_customer_id=c.customer_id right join sales_items as d on d.sales_order_id=a.sales_order_id left join item_type as e on e.item_type_id=d.sales_items_type left join item_sub_type as f on f.item_subtype_id=d.sales_items_subtype left join item_details as g on g.item_details_id=d.sales_items_partno left join generator_details as h on h.generator_id=a.sales_generator_id left join kva_type as i on h.generator_type_kva=i.kva_type_id where d.sales_items_partno=$part");
		  $post = $command->queryall();
		 foreach($post as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als[$pot][]=$pets;	
			}
		}
		  return $this->render('balaces' ,['model' => @$als,'s'=>$s]);
		}
		}
		  return $this->render('balaces');
	}	
	public function actionReportcustomer()
	{
		if(yii::$app->request->post())
		{
	    $get=yii::$app->request->post();		
		//$subtype=$get['subtype'];
		//$type=$get['type'];
		 $part=$get['customer'];
         if($part!="CHOOSE CUSTOMER")
		{
		//$from=$get['from_date'];
		//$to=$get['to_date'];
		$rate=new ItemDetails();
		$s=$rate->find()->select('item_price')->where(['item_details_id'=>$part])->asArray()->all();
	    $command=\Yii::$app->db->createCommand("select d.initial_stock,a.sales_order_id,c.customer_name,a.sales_date,e.item_type_name,f.item_subtype_name,g.item_part_no,d.sales_item_qty,d.sales_item_unit_price,d.sales_item_total_price,h.generator_code from sales_order as a left join customer_details as c on a.sales_customer_id=c.customer_id right join sales_items as d on d.sales_order_id=a.sales_order_id left join item_type as e on e.item_type_id=d.sales_items_type left join item_sub_type as f on f.item_subtype_id=d.sales_items_subtype left join item_details as g on g.item_details_id=d.sales_items_partno left join generator_details as h on h.generator_id=a.sales_generator_id where sales_customer_id=$part");
		  $post = $command->queryall();
		 foreach($post as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als[$pot][]=$pets;	
			}
		}
		  return $this->render('customer' ,['model' => @$als,'s'=>$s]);
		}
		}
		  return $this->render('customer');
	}	
	
	public function actionReportgenerator()
	{
		if(yii::$app->request->post())
		{
	    $get=yii::$app->request->post();		
	
		$part=$get['generator'];
		If($part!=0)
		{
		$rate=new ItemDetails();
		//$s=$rate->find()->select('item_price')->where(['item_details_id'=>$part])->asArray()->all();
	    $command=\Yii::$app->db->createCommand("select b.brand_name as name,c.brand_name as alt_name,d.item_part_no as oil,g.item_part_no as diesel,h.item_part_no as water,i.item_part_no as air,a.generator_engine_no,a.generator_alternator_no,CONCAT(a.generator_belt_name,'/',a.generator_belt_size) as belt_details,CONCAT(a.generator_oil_grade,'/',a.generator_oil_qty) as oil_details,a.generator_dynamo,a.generator_selfmotor  from generator_details as a left join ms_brand as b on a.generator_engine_name=b.brand_id left join  ms_brand as c  on a.generator_alternator_name=c.brand_id left join item_details as d on d.item_details_id=a.generator_oil_filter left join item_details as g on g.item_details_id=a.generator_diesel_filter left join item_details as h on h.item_details_id=a.generator_water_filter left join item_details as i on i.item_details_id=a.generator_air_filter left join kva_type as j on a.generator_type_kva=j.kva_type_id left join generator_type as k on a.generator_type=k.generator_type_name where a.generator_id=$part limit 0,1");
		  $post = $command->queryall();


$command1=\Yii::$app->db->createCommand("select a.delivery_start_date,a.delivery_end_date,concat(b.customer_name,'/',c.address_name) as site,a.delivery_startread_time,a.delivery_endread_time from delivery_challan as a left join customer_details as b on
 a.delivery_customer_id=b.customer_id left join ms_address as c on a.delivery_customer_shipping=c.address_id left join ms_employee as d on a.delivery_operator_id=d.employee_id left join ms_employee as e on a.delivery_operator_id=e.employee_id where a.delivery_generator_id=$part");

		  $post1 = $command1->queryall();


		 
		 foreach($post as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als[$pot][]=$pets;	
			}
		}
                foreach($post1 as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als1[$pot][]=$pets;	
			}
		}
		
		  return $this->render('generator' ,['model' => @$als,'models1' => @$als1]);
		
		}
		}
		  return $this->render('generator');
	}
	
	
	
	
	
	public function actionReportbalanceitem()
	{
		if(yii::$app->request->post())
		{
	    $get=yii::$app->request->post();		
		$para[]=  $subtype=$get['subtype'];
		$para[]=  $type=$get['type'];
		$para[]=  $part=$get['part'];
		 if($subtype!=0)
		 {
		 $where="a.item_type_id=".$subtype;
		 }
		 if($type!=0)
		 {
		 $where.=" and a.item_subtype_id=".$type;
		 }
		 if($part!=0)
		 {
		 $where.=" and a.item_details_id=".$part;
		 
		 
	
		//$from=$get['from_date'];
		//$to=$get['to_date'];
		$rate=new ItemDetails();
	    $command=\Yii::$app->db->createCommand("SELECT c.item_subtype_name,b.item_type_name,a.item_part_no,a.item_quantity FROM `item_details` as a left join item_type as b on a.item_type_id=b.item_type_id left join item_sub_type as c on c.item_subtype_id=a.item_subtype_id where $where");
		  $post = $command->queryall();
		 foreach($post as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als[$pot][]=$pets;	
			}
		}
		  return $this->render('balanceitem' ,['model' => @$als,'para'=>$para]);
		}
		}
		  return $this->render('balanceitem');
	}
	


         public function actionReportbooking()
	{
		if(yii::$app->request->post())
		{
	    $get=yii::$app->request->post();		
		
		$part=$get['customer'];
                 $gen=$get['gen'];

$where=($part!=0) ? "a.delivery_customer_id=".$part : "";
$where.=($gen!=0) ? " and a.delivery_generator_id=".$gen :"";
$get=substr($where,0,4);
$where=($get==" and")? substr($where,4) :$where;
;
if($gen ==0 and $part==0)
{
return $this->render('booking');
exit();
}
	
		//$from=$get['from_date'];
		//$to=$get['to_date'];
		$rate=new ItemDetails();
	    $command=\Yii::$app->db->createCommand("select a.delivery_start_date,a.delivery_end_date,concat(b.customer_name,'/',c.address_name) as site,d.employee_name as operator,a.delivery_vehicle_no,a.delivery_method,a.delivery_startread_time,a.delivery_endread_time,a.delivery_end_date,a.delivery_start_date,a.delivery_particulars,e.employee_name as driver,a.delivery_startread_time,a.delivery_endread_time from delivery_challan as a left join customer_details as b on
 a.delivery_customer_id=b.customer_id left join ms_address as c on a.delivery_customer_id=c.address_id left join ms_employee as d on a.delivery_operator_id=d.employee_id left join ms_employee as e on a.delivery_driver_id=e.employee_id where $where");
		  $post = $command->queryall();
		 foreach($post as $posts=>$pet)
		{
			foreach($pet as $pot=>$pets)
			{
			@$als[$pot][]=$pets;	
			}
		}
		  return $this->render('booking' ,['model' => @$als]);
		}
		  return $this->render('booking');
	}

	
	
	
	
}