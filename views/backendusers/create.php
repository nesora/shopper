<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Backendusers */

$this->title = 'Create Backendusers';
$this->params['breadcrumbs'][] = ['label' => 'Backendusers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backendusers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
