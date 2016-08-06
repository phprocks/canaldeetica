<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = "Mensagem - Protocolo #" . $model->protocol;
?>
<div class="occurrence-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <div class="panel panel-default">
      <div class="panel-heading"><h5>Mensagem</h5></div>
      <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'protocol',
            ],
        ]) ?>
      </div>
    </div>    
</div>