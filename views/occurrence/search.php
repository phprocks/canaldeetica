<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Occurrence;

$this->title = 'Pesquisar Mensagem';
?>
<div class="occurrence-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <?php echo $this->render('_protocol', ['model' => $searchModel]); ?>

    <p>
    <hr/>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'tableOptions' => ['class'=>'table table-striped table-bordered table-hover'],
        'summary'      =>  '',
        'showFooter'   => false,
        'showOnEmpty'  => false, 
        'rowOptions'   => function ($model, $index, $widget, $grid) {
            return [
                'id' => $model['id'], 
                'onclick' => 'location.href="'
                    . Yii::$app->urlManager->createUrl('occurrence/protocol') 
                    . '&id="+(this.id);',
                'style' => "cursor: pointer",
            ];
        },                
        'columns' => [
            'protocol',
            'subject',
        ],
    ]); ?>
</div>