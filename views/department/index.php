<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Occurrence;

$this->title = 'Ocorrências';
?>
<div class="occurrence-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <div class="panel panel-default">
      <div class="panel-heading">Opções de Filtros</div>
      <div class="panel-body">
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
      </div>
    </div>    
    
    <div class="panel panel-default">
    <div class="panel-body">    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
              'attribute' => 'protocol',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 5%;text-align:center'],
            ], 
            [
              'attribute' => 'created',
              'enableSorting' => true,
              'contentOptions'=>['style'=>'width: 5%;text-align:center'],
              'format' => ['date', 'php:d/m/Y'],
            ],             
            [
              'attribute' => 'subject',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getSubject(); // OR use magic property $data->requestedMounthValue;
              },
              'filter' => Occurrence::$Static_subject,
              'contentOptions'=>['style'=>'width: 20%;text-align:center'],
            ],                         
            'message',
            [
              'attribute' => 'status',
              'enableSorting' => true,
              'value' => function($data) {
                  return $data->getStatus();
              },
              'filter' => Occurrence::$Static_status,
              'contentOptions'=>['style'=>'width: 10%;text-align:center'],
            ], 
            [
            'class' => 'yii\grid\ActionColumn',
            'contentOptions'=>['style'=>'width: 8%;text-align:right'],
            ],
        ],
    ]); ?>
    </div>
    </div>
</div>