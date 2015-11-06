<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\models\User;
use app\assets\DashboardAppAsset;
use yii\helpers\ArrayHelper as help;

/* @var $this \yii\web\View */
/* @var $content string */

$session = Yii::$app->session;

//print_r($session['auth']);
if (!$session->has('auth'))
{
	 $model = new User();
	 $url['url_name'][]="site/login";
	 $model->url=$url;
$session['auth']=$model;
}


$access=help::checkUrl(1);


if($access==false)
{
return Yii::$app->getResponse()->redirect('index.php?r=site/login');
	exit();
}
	DashboardAppAsset::register($this);

	?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>construction</title>
    <?php $this->head() ?>
</head>
<body  class="hold-transition skin-blue sidebar-mini">

<?php
if(Yii::$app->request->get('page'))
{
	$page=Yii::$app->request->get('page');
	$session = Yii::$app->session;
	$session['page']=$page;
	}
/*$command = Yii::$app->db->createCommand('select * from  item_details  where item_alert_quantity>item_quantity');
        @$command->bindValue(':category_id',$id);
        @$peg = @$command->queryall();
*/
?>
<?php $this->beginBody() ?>
    <div class="wrapper">
	<header class="main-header" >
        <!-- Logo -->
        <a href="?r=site/index" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
       <p style='font-size:16px; margin-right:7px !important;'>B&W</p>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <?php if(help::checkUrl("site/index")) { echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o" onclick="tops()"></i>
                  <span class="label label-warning">'; } ?><?php
				  if(help::checkUrl("site/index")) 
				  {
if(count(@$peg)!=0)
{
			  foreach($peg as $peeg)
{
	
	$cnt=count($peeg['item_quantity']);
	echo $cnt;
	
}	
}
				  }
			?></span>
                </a>
                <ul class="dropdown-menu">
                  <?php if(help::checkUrl("site/index")) { echo '<li class="header">You have no notifications</li>'; } ?>
				  
                  <li>
                    <!-- inner menu: contains the actual data -->
					<?php
if(count(@$peg)!=0)
{
			foreach($peg as $peeg)
{
	echo "<div id='alert' style='display:none'><a href='index.php?r=item-details'>Part no:".$peeg['item_part_no'];
	echo "=Item Quantity".$peeg['item_quantity'];
	echo "</a><br></div>";
	
}
}
			?></a>
                   
                  </li>
                  <li class="footer"><a href="#">View all</a></li>
                </ul>
              </li>
              
			  <li>
			  <?php
			  $session = Yii::$app->session;
			  $sess=$session['auth']['user_name'];
			  ?><div style="color:#ffffff; margin-top:15px; margin-left:10px; margin-right:10px"><strong><?php echo strtoupper($sess); ?></strong></div>
			  </li>
			  <li class="dropdown tasks-menu">
			   <?php if($sess!="") { echo ' <a href="index.php?r=site/log" class="btn btn-danger">Sign out</a>'; } ?>
			  </li>
                         
            </ul>
          </div>
        </nav>
		</header>
		<?php
		?>
	 <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
             <?php if(help::checkUrl("site/index")) { echo '<li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
             <a href="index.php?r=site/">
			  
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
				
              </a>'; } ?>
              
            </li>
			
			
			<li class="treeview">
              <?php if(help::checkUrl("builder/")) { echo '<a href="#">
                <i class="fa fa-users"></i>
                <span>Builders</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>'; } ?>
              <ul class="treeview-menu">
			  
               <?php if(help::checkUrl("builder/")) { echo '<li><a href="index.php?r=builder/"><i class="fa fa-user"></i>Builder</a></li>'; } ?>
				<?php if(help::checkUrl("sub-division/")) { echo '<li><a href="index.php?r=sub-division"><i class="fa fa-houzz"></i>Sub Division</a></li>'; } ?>
				<?php //if(help::checkUrl("pump-company/")) { echo '<li><a href="index.php?r=pump-company"><i class="glyphicon glyphicon-wrench"></i>Pump Company</a></li>'; } ?>
				<?php if(help::checkUrl("foreman/")) { echo '<li><a href="index.php?r=foreman"><i class="fa fa-align-justify"></i>Foreman</a></li>'; } ?>
				
				
				
				
            </ul>
            </li>
			<li class="treeview">
              <?php if(help::checkUrl("job/")) { echo '<a href="#">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span>Jobs</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>'; } ?>
              <ul class="treeview-menu">
			  
            <?php if(help::checkUrl("job/")) { echo '<li><a href="index.php?r=job"><i class="glyphicon glyphicon-plus-sign"></i>Job</a></li>'; } ?>   
				<?php if(help::checkUrl("job-card/")) { echo '<li><a href="index.php?r=job-card"><i class="glyphicon glyphicon-wrench"></i>Job Card</a></li>'; } ?>
				<?php if(help::checkUrl("concrete-schedule/")) { echo '<li><a href="index.php?r=concrete-schedule"><i class="glyphicon glyphicon-wrench"></i>Concrete Schedule</a></li>'; } ?>
				
				
				
				
              </ul>
            </li>
			
				<li class="treeview">
              <?php if(help::checkUrl("pump-company/")) { echo '<a href="#">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span>Companies</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>'; } ?>
              <ul class="treeview-menu">
			  
               <?php if(help::checkUrl("pump-company/")) { echo '<li><a href="index.php?r=pump-company/"><i class="glyphicon glyphicon-plus-sign"></i>Pump-company</a></li>'; } ?>
  <?php if(help::checkUrl("concrete-company/")) { echo '<li><a href="index.php?r=concrete-company/"><i class="glyphicon glyphicon-plus-sign"></i>Concrete company</a></li>'; } ?>
				<!--<?php if(help::checkUrl("foreman/")) { echo '<li><a href="index.php?r=foreman"><i class="glyphicon glyphicon-wrench"></i>List Foreman</a></li>'; } ?>-->
				
				
				
				
				
              </ul>
            </li>
			
			
		
				<li class="treeview">
              <?php if(help::checkUrl("pump-company/")) { echo '<a href="#">
                <i class="glyphicon glyphicon-shopping-cart"></i>
                <span>Concrete Schedule</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>'; } ?>
              <ul class="treeview-menu">
		 <?php if(help::checkUrl("concrete-schedule/create")) { echo '<li><a href="index.php?r=concrete-schedule/create"><i class="glyphicon glyphicon-plus-sign"></i>Schedule Create</a></li>'; } ?>	  
               <?php if(help::checkUrl("concrete-schedule/")) { echo '<li><a href="index.php?r=concrete-schedule/"><i class="glyphicon glyphicon-plus-sign"></i>Schedule</a></li>'; } ?>

 
			
				
				
				
				
				
              </ul>
            </li>	
			
		
			
	
        </section>
        <!-- /.sidebar -->
      </aside>
	  <?php
	  

	  ?>
	  
	  
	  
	  <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row" role="search">
            <!-- ./col -->
          
          <!-- Main row -->
        <div class="col-md-12">
		

            
			<?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
			
			<div class="box">
			<div class="col-md-12">
            <?= $content ?></div></div>
          </div></div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div>
        <?php
            
        ?>

        <div class="container">
            
        </div>
    </div>

    <footer class="footer">
        <div class="container">
        <p class="pull-left">&copy; B&W Construction <?= date('Y') ?></p>

        <p class="pull-right">Powered by XMEDIASOLUTIONS</p>
    </div>
    </footer>
	<?php
if (class_exists('yii\debug\Module')) {
    $this->off(\yii\web\View::EVENT_END_BODY, [\yii\debug\Module::getInstance(), 'renderToolbar']);
} ?>
<?php $this->endBody() ?>
</div>
</body>
<style>
div.required label:after {
    content: " *";
    color: red;
}
.table{
	margin-top:15px;
}
thead tr th{
	background-color:#3C8DBC;
	border-radius:5px;
	}
	
thead tr td .form-control{
	border-radius:5px;
	background-color:#f7f4f4;
	border-color:#3C8DBC;
	
}
.breadcrumb{
	border-radius:5px;
	border-color:#3C8DBC;
}
thead tr th a{
	color:#ffffff;
}
th{
	color:#c7c9cc;
}
</style>
<script>
function tops()
{
	$("#alert").toggle();
}
</script>
</html>
<?php $this->endPage() ?>
<?php
if($sess!="")
{
?>
<script>
$(document).ready(function(){
        $(".sidebar-mini").addClass("sidebar-collapse");
});
</script>
<?php
}
?>
