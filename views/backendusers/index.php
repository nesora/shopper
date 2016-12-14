<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Backendusers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="backendusers-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Backendusers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'email:email',
            'password',
            'address',
            'city',
            // 'country',
            // 'token',
            // 'expiredate',
            // 'firstname',
            // 'lastname',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
