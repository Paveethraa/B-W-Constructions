<?php
use app\models\PurchaseOrder;
use app\models\SalesOrder;
use app\models\CustomerDetails;
use app\models\VendorDetails;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\ArrayHelper as help;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
/*
?>

<div class="site-index">
<section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
   


        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
	           <h3> <?php
				$sql = 'SELECT count(purchase_order_id) FROM purchase_order';
				$model = PurchaseOrder::find($sql)->asArray()->all(); 
				echo count($model);
				
				?>
                 </h3>
                  <p>Stock Inwards</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="index.php?r=purchase-order" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                   <h3> <?php
				$sql = 'SELECT count(sales_order_id) FROM sales_order';
				$model = SalesOrder::find($sql)->asArray()->all(); 
				echo count($model);
				
				?>
                 </h3>
                  <p>Consumable</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3> <?php
				$sql = 'SELECT count(customer_id) FROM customer_details';
				$model = CustomerDetails::find($sql)->asArray()->all(); 
				echo count($model);
				
				?>
                 </h3>
                  <p>Customers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="index.php?r=customer-details" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                  <h3> <?php
				$sql = 'SELECT count(vendor_id) FROM vendor_details';
				$model = VendorDetails::find($sql)->asArray()->all(); 
				echo count($model);
				
				?>
                 </h3>
                  <p>Vendors</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="index.php?r=vendor-details" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
			
			
				
			
			
			



</div>






<div class="quick-links">
<div class="col-md-12" style="background-color:#ffffff; padding:15px; border-radius:5px;">
<ul>
<li>
<a href="index.php?r=item-details"><Button class="glyphicon glyphicon-list-alt btn bg-maroon"><br> Itemdetails</button></a>
</li>
<li>
<a href="index.php?r=purchase-order"><Button class="glyphicon glyphicon-shopping-cart btn bg-purple"><br> PurchaseOrder</button></a>
</li>
<li>
<a href="index.php?r=sales-order"><Button class="glyphicon glyphicon-upload btn bg-olive"><br> Consumable</button></a>
</li>
<li>
<a href="index.php?r=generator-details"><Button class="glyphicon glyphicon-barcode btn bg-blue"><br> GeneratorDetails</button></a>
</li>
<li>
<a href="index.php?r=generator-type"><Button class="glyphicon glyphicon-list btn bg-navy"><br> GeneratorType</button></a>
</li>
<li>
<a href="index.php?r=customer-details"><Button class="fa fa-users btn bg-orange"><br><br> CustomerDetails</button></a>
</li>
<li>
<a href="index.php?r=vendor-details"><Button class="fa fa-users btn bg-info"><br><br> VendorDetails</button></a>
</li>
</ul>
</div>
</div>

<style>
.quick-links ul {
    
    padding:0;
    list-style: none;
  }
.quick-links ul li{
	margin:auto;
	float:left;
	padding-right:30px;
}
.quick-links{
	background-color:#ffffff;
}
</style>

<?php
*/
?>