<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = "Protocolo: ".$model->protocol;
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