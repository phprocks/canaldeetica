<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use amnah\yii2\user\models\User;


$this->title = "Mensagem - Protocolo #" . $model->protocol;
?>
<?php
    $t = $model->id;
    $dataProvider = new SqlDataProvider([
        'sql' => "SELECT a.id, a.name as arquivo, occurrence_id
        FROM attachment a
        WHERE a.occurrence_id =  $t",
        'totalCount' => 200,
        'sort' =>false,
        'key'  => 'id',
        'pagination' => [
            'pageSize' => 200,
        ],
    ]);
?>
<div class="occurrence-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>
    <p>
        <?= Html::a('Alterar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Deseja realmente excluir?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
      <div class="col-md-8">

    <div class="panel panel-default">
      <div class="panel-heading"><h4>Detalhes da Mensagem </h4></div>
      <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [ 
                    'attribute' => 'created',
                    'format' => 'raw',
                    'value' => date("d/m/Y",  strtotime($model->created))
                ],  
                [ 
                    'attribute' => 'location',  
                    'format' => 'raw',
                    'value' => $model->Location,
                ],                             
                [ 
                    'attribute' => 'subject',  
                    'format' => 'raw',
                    'value' => $model->Subject,
                ],                        
                'message:ntext',
            ],
        ]) ?>
      </div>
    </div> 

      </div>
      <div class="col-md-4">

      <div class="panel panel-default">
      <div class="panel-heading"><h4>Anexos </h4></div>
      <div class="panel-body">
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'emptyText'    => '</br><p class="text-danger">Nenhum arquivo anexado!</p>',
            'summary'      =>  '',
            'showHeader'   => false,
            'columns' => [
                    [
                    'attribute'=>'arquivo',
                    'format' => 'raw',
                    'value'=>function ($data) {
                        return Html::a($data["arquivo"], Yii::$app->request->baseUrl."/attachment/".$data["occurrence_id"]."/".$data["arquivo"], ['target' => '_blank']);
                    },                                     
                    'contentOptions'=>['style'=>'width: 70%;text-align:left'],
                    ],
            ],
            ]); ?>
        </div>
        </div>

      </div>
    </div>    

   

    <div class="row container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading"><h4>Identificação</h4></div>
      <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [ 
                    'attribute' => 'reporter_name',
                    'format' => 'raw',
                    'value' => $model->reporter_name <> '' ? $model->reporter_name : '<span class="not-set">(não informado)</span>',
                ],                 
                [ 
                    'attribute' => 'reporter_email',
                    'format' => 'raw',
                    'value' => $model->reporter_email <> '' ? $model->reporter_email : '<span class="not-set">(não informado)</span>',
                ],                  
                [ 
                    'attribute' => 'reporter_phone',
                    'format' => 'raw',
                    'value' => $model->reporter_phone <> '' ? $model->reporter_phone : '<span class="not-set">(não informado)</span>',
                ],                  
                [ 
                    'attribute' => 'reporter_celphone',
                    'format' => 'raw',
                    'value' => $model->reporter_celphone <> '' ? $model->reporter_celphone : '<span class="not-set">(não informado)</span>',
                ],                  
            ],
        ]) ?>  
      </div>
    </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading"><h5>Sobre a Ocorrencia</h5></div>
      <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                [ 
                    'attribute' => 'status',  
                    'format' => 'raw',
                    'value' => $model->Status,
                ],            
                'answer',
                // [ 
                //     'attribute' => 'updated_by',  
                //     'format' => 'raw',
                //     'value' => $model->user->username,
                // ],                
                [ 
                    'attribute' => 'updated',
                    'format' => 'raw',
                    'value' => $model->updated <> '' ? date("d/m/Y",  strtotime($model->updated)) : '<span class="not-set">(não alterado)</span>',
                ],                 
            ],
        ]) ?>  
      </div>
    </div>    

</div>