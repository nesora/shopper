<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Forgotten Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-lg-3 ">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Enter your email address']) ?>
        <div class="form-group forgotbuton">
            <?= Html::submitButton('Send', ['class' => 'btn btn-primary', 'name' => 'forgot-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
