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
    
    <p>
    <?php
    use kartik\export\ExportMenu;
              $gridColumns = [
                  ['attribute'=>'protocol', 'hAlign'=>'right', 'width'=>'20px'],
                  ['attribute'=>'created','format'=>['date'], 'hAlign'=>'right', 'width'=>'110px'],
                  [
                  'attribute'=>'subject',
                  'label'=> 'Situação',
                  'vAlign'=>'middle',
                  'width'=>'100px',
                  'value' => function($data) {
                      return $data->getSubject();
                  },
                  'format'=>'raw'
                  ],
                  [
                  'attribute'=>'location',
                  'label'=> 'Local',
                  'vAlign'=>'middle',
                  'width'=>'100px',
                  'value' => function($data) {
                      return $data->getLocation();
                  },
                  'format'=>'raw'
                  ],
                  ['attribute'=>'message', 'hAlign'=>'right', 'width'=>'100px'],
                  [
                  'attribute'=>'status',
                  'label'=> 'Proposta',
                  'vAlign'=>'middle',
                  'width'=>'100px',
                  'value' => function($data) {
                      return $data->getStatus();
                  },
                  'format'=>'raw'
                  ],
                  ['attribute'=>'reporter_name', 'hAlign'=>'right', 'width'=>'100px'], 
                  ['attribute'=>'reporter_email', 'hAlign'=>'right', 'width'=>'100px'],
                  ['attribute'=>'reporter_phone', 'hAlign'=>'right', 'width'=>'100px'],
                  ['attribute'=>'reporter_celphone', 'hAlign'=>'right', 'width'=>'100px'],
                  ['attribute'=>'answer', 'hAlign'=>'right', 'width'=>'100px'],
              ];
              echo ExportMenu::widget([
              'dataProvider' => $dataProvider,
              'columns' => $gridColumns,
              'fontAwesome' => true,
              'emptyText' => 'Nenhum registro',
              'showColumnSelector' => true,
              'asDropdown' => true,
              'target' => ExportMenu::TARGET_BLANK,
              'showConfirmAlert' => false,
              'exportConfig' => [
                ExportMenu::FORMAT_HTML => false,
                ExportMenu::FORMAT_CSV => false,
                ExportMenu::FORMAT_TEXT => false,
                ExportMenu::FORMAT_PDF => false
            ],
            'columnSelectorOptions' => [
              'class' => 'btn btn-success',
            ],
            'dropdownOptions' => [
              'icon' => false,
              'label' => 'Exportar Registros',
              'class' => 'btn btn-success',
            ],
            'filename' => 'relatorio-ocorrencias-'.date('Y-m-d'),
            ]);
    ?> 
    </p>

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