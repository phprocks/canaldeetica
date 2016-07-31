<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Occurrence;

$this->title = 'Minhas Mensagens';
?>
<div class="occurrence-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            [
              'attribute' => 'protocol',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 8%;text-align:center'],
            ],         
            [
              'attribute' => 'created',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 5%;text-align:center'],
              'format' => ['date', 'php:d/m/Y'],
            ],             
            [
              'attribute' => 'type',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getType(); // OR use magic property $data->requestedMounthValue;
              },
              'filter' => Occurrence::$Static_type,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ],             
            [
              'attribute' => 'returntype',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getReturntype();
              },
              'filter' => Occurrence::$Static_returntype,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ],             
            'subject',
            [
              'attribute' => 'status',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getStatus();
              },
              'filter' => Occurrence::$Static_status,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ], 
        ],
    ]); ?>
</div>