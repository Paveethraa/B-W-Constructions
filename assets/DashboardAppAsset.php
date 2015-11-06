<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 //Live
/*class DashboardAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		'//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css',
		'../yii/vendor/theme/AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css',
		'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
   'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
   '../yii/vendor/theme/AdminLTE-2.3.0/dist/css/AdminLTE.min.css',
    '../yii/vendor/theme/AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/iCheck/flat/blue.css',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/morris/morris.css',
   '../yii/vendor/theme/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/datepicker/datepicker3.css',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/daterangepicker/daterangepicker-bs3.css',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
	
		
    ];
	public $jsOptions = array(
    'position' => \yii\web\View::POS_HEAD
);
    public $js = [
	'//code.jquery.com/jquery-1.10.2.js',
	'//code.jquery.com/ui/1.11.2/jquery-ui.js',
	'../yii/vendor/theme/AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js',
	'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
	'../yii/vendor/theme/AdminLTE-2.3.0/bootstrap/js/bootstrap.min.js',
	 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/morris/morris.min.js',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/sparkline/jquery.sparkline.min.js',
   '../yii/vendor/theme/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
   '../yii/vendor/theme/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/knob/jquery.knob.js',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/daterangepicker/daterangepicker.js',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/datepicker/bootstrap-datepicker.js',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    '../yii/vendor/theme/AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js',
   '../yii/vendor/theme/AdminLTE-2.3.0/plugins/fastclick/fastclick.min.js',
   '../yii/vendor/theme/AdminLTE-2.3.0/dist/js/app.min.js',
 
   '../yii/vendor/theme/AdminLTE-2.3.0/dist/js/demo.js',
	
	
	
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		
		
    ];
}*/

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

class DashboardAppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
		'//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css',
		'../vendor/theme/AdminLTE-2.3.0/bootstrap/css/bootstrap.min.css',
		'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css',
   'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css',
   '../vendor/theme/AdminLTE-2.3.0/dist/css/AdminLTE.min.css',
    '../vendor/theme/AdminLTE-2.3.0/dist/css/skins/_all-skins.min.css',
    '../vendor/theme/AdminLTE-2.3.0/plugins/iCheck/flat/blue.css',
    '../vendor/theme/AdminLTE-2.3.0/plugins/morris/morris.css',
   '../vendor/theme/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
    '../vendor/theme/AdminLTE-2.3.0/plugins/datepicker/datepicker3.css',
    '../vendor/theme/AdminLTE-2.3.0/plugins/daterangepicker/daterangepicker-bs3.css',
    '../vendor/theme/AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
	
		
    ];
	public $jsOptions = array(
    'position' => \yii\web\View::POS_HEAD
);
    public $js = [
	'//code.jquery.com/jquery-1.10.2.js',
	'//code.jquery.com/ui/1.11.2/jquery-ui.js',
	'../vendor/theme/AdminLTE-2.3.0/plugins/jQuery/jQuery-2.1.4.min.js',
	'https://code.jquery.com/ui/1.11.4/jquery-ui.min.js',
	'../vendor/theme/AdminLTE-2.3.0/bootstrap/js/bootstrap.min.js',
	 'https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',
    '../vendor/theme/AdminLTE-2.3.0/plugins/morris/morris.min.js',
    '../vendor/theme/AdminLTE-2.3.0/plugins/sparkline/jquery.sparkline.min.js',
   '../vendor/theme/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
   '../vendor/theme/AdminLTE-2.3.0/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
    '../vendor/theme/AdminLTE-2.3.0/plugins/knob/jquery.knob.js',
    'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js',
    '../vendor/theme/AdminLTE-2.3.0/plugins/daterangepicker/daterangepicker.js',
    '../vendor/theme/AdminLTE-2.3.0/plugins/datepicker/bootstrap-datepicker.js',
    '../vendor/theme/AdminLTE-2.3.0/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
    '../vendor/theme/AdminLTE-2.3.0/plugins/slimScroll/jquery.slimscroll.min.js',
   '../vendor/theme/AdminLTE-2.3.0/plugins/fastclick/fastclick.min.js',
   '../vendor/theme/AdminLTE-2.3.0/dist/js/app.min.js',
 
   '../vendor/theme/AdminLTE-2.3.0/dist/js/demo.js',
	
	
	
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
		
		
    ];
}


