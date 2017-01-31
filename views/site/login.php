<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-login">
    <div class="login-message"> 
        <h1 class="login-message"><?= Html::encode($this->title) ?></h1>
    </div>
    <form method="post">
        <div class="loginemail col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <span class="emailword">  Email  </span>
            <input name="LoginForm[email]"  placeholder="Write your email address" type="text">
        </div>
        <div class="loginpassword"> 
            <span class="passwordword"> Password </span>
            <input name="LoginForm[password]" placeholder="Write your password" type="password">
        </div>
        <br>
        <div class="form-group">
            <div>
                <div class="register">
                    <?= Html::a(Yii::t("app", "Register"), ["/site/register"]) ?>
                </div>
                <br>
                <div class="forgot-pas">
                    <?= Html::a(Yii::t("app", "Forgotten  password") . "?", ["/site/forgot"]) ?>
                    <br>
                </div>
                <br>
                <div class="login-button">
                    <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>
            </div>
        </div>
        <input type="hidden" value="" name="_csrf" >
    </form>
</div>
