<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


?>
<body class="hold-transition login-page">
 <div class="login-box">

        <h3> <p class="login-box-msg"><b>LOGIN</b></p></h3>
      
 <div class="login-box-body">
<br>

<div class="site-login">
    

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>
<div class="col-md-1"></div><div class="col-md-10">
	<div class="form-group field-user-user_name has-feedback required">
	<input type="text" class="form-control" name="User[user_name]" placeholder="User Name">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span></div>
			
			<div class="form-group field-user-password required has-feedback">
            <input type="password" id="user-password" class="form-control" name="User[password]" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div></div><div class="col-md-1"></div>
     

       <div class="row form-group field-user-rememberme">
	   <div class="col-xs-1"></div>
            <div class="col-xs-5"><br>
              <div class="checkbox icheck">
              
                  <input type="hidden" name="User[rememberMe]" value="0"><input type="checkbox" id="user-rememberme" name="User[rememberMe]" value="1">
				  <label for="user-rememberme"> Remember Me</label>
               
              </div>
            </div><!-- /.col -->
           <div class="col-xs-4"><br>
              <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
            </div>
         </div>

       
        

    <?php ActiveForm::end(); ?>

    <!--<div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>-->

</div>
</div>
</div>
</body>