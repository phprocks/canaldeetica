<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = "Mensagem - Protocolo #" . $model->protocol;
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

    <div class="panel panel-default">
      <div class="panel-heading"><h5>Detalhes da Mensagem </h5></div>
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
                    'attribute' => 'type',  
                    'format' => 'raw',
                    'value' => $model->Type,
                ],
                [ 
                    'attribute' => 'returntype',  
                    'format' => 'raw',
                    'value' => $model->Returntype,
                ],      
                [ 
                    'attribute' => 'employee',  
                    'format' => 'raw',
                    'value' => $model->Employee,
                ],                         
                'subject',
                'message:ntext',
            ],
        ]) ?>
      </div>
    </div>    

    <div class="row container-fluid">
    <div class="panel panel-default">
      <div class="panel-heading"><h5>Identificação</h5></div>
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
                'updated_by',
                'updated',
            ],
        ]) ?>  
      </div>
    </div>    

</div>