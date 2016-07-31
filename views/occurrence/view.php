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
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
            'subject',
            'message:ntext',
            [ 
                'attribute' => 'created',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->created))
            ],  
            'user_id',
        ],
    ]) ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [ 
                'attribute' => 'status',  
                'format' => 'raw',
                'value' => $model->Status,
            ],  
            'answer:ntext',
            [ 
                'attribute' => 'updated',
                'format' => 'raw',
                'value' => date("d/m/Y",  strtotime($model->updated))
            ], 
            'updated_by',
        ],
    ]) ?>    

</div>
