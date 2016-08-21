<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\data\SqlDataProvider;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;


$this->title = "Protocolo: ".$model->protocol;
?>
<?php
    $t = Yii::$app->getRequest()->getQueryParam('id');
    $cod = $model->id;
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

    <?php foreach (Yii::$app->session->getAllFlashes() as $key=>$message):?>
        <?php $alertClass = substr($key,strpos($key,'-')+1); ?>
        <div class="alert alert-dismissible alert-<?=$alertClass?>" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><?=$message?></p>
        </div>
    <?php endforeach ?>

    <?php 
    if ($dataProvider->count < Yii::$app->params['imglimit']) {
    echo Html::a('<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> Incluir Anexos', ['/attachment/create', 'id' => $model->id], ['class' => 'btn btn-success']);
    } else {
        echo "";
    }
    ?>


<div class="row">

    <div class="col-md-8">
    <div class="panel panel-default">
    <div class="panel-heading"><strong>Detalhes do Registro</strong></div>
    <div class="panel-body" style="height: 250px;max-height: 250;">

    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [           
                [ 
                    'attribute' => 'subject',  
                    'format' => 'raw',
                    'value' => $model->Subject,
                ],          
                [ 
                    'attribute' => 'location',  
                    'format' => 'raw',
                    'value' => $model->Location,
                ], 
                [ 
                    'attribute' => 'created',
                    'format' => 'raw',
                    'value' => date("d/m/Y",  strtotime($model->created))
                ],   
                'message:ntext',                            
            ],
        ]) ?> 
    </div>
    </div> 
    </div>
  
    <div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading"><strong>Anexos</strong></div>
    <div class="panel-body" style="height: 250px;max-height: 250;">

    <?php Pjax::begin(['id' => 'pjax-container']) ?>
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'emptyText'    => '</br><p class="text-danger">Nenhum arquivo anexado!</p>',
            'summary'      =>  '',
            'showHeader'   => false,
            'columns' => [
                    [
                    'attribute'=>'img',
                    'format' => 'html',
                    'value'=>function ($data) {
                        return $data["arquivo"];
                    },                                     
                    'contentOptions'=>['style'=>'width: 70%;text-align:left'],
                    ],
            ],
            ]); ?>
            <?php Pjax::end() ?>
    </div>
    </div>
    </div>
</div>

<div class="row">
    
    <div class="col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading"><strong>Resposta / Tratamento do Registro de Incidente</strong></div>
    <div class="panel-body">

    <?= DetailView::widget([
            'model' => $model,
            'attributes' => [           
                [ 
                    'attribute' => 'status',  
                    'format' => 'raw',
                    'value' => $model->Status,
                ],  
                [ 
                    'attribute' => 'answer',  
                    'format' => 'html',
                    'value' => $model->answer,
                ],                                
            ],
        ]) ?> 
    </div>
    </div> 
    </div>

</div>

</div>