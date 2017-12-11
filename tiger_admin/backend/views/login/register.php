<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- MetisMenu CSS -->
    <!-- <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet"> -->

    <!-- Custom CSS -->
    <link href="public/assets/css//sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
	<link rel="stylesheet" href="public/assets/css/font-awesome.min.css" />


</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">注册</h4>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['action' => '?r=login/register'],'post');?>
                            <fieldset>
                                <div class="form-group">
                                    <?= $form->field($model, 'username')->label('请输入用户名') ?>
                                </div>
                                <div class="form-group">
                                    <?= $form->field($model, 'password')->label('请输入密码')->passwordInput(); ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <?= Html::submitButton('注册', ['class' => 'btn btn-lg btn-success btn-block'])?>
                                <a href="<?=Url::toRoute(['login/login']);?>" class="btn ">已经有账号密码？点击登录</a>
                            </fieldset>
                        <?php ActiveForm::end();?>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>
