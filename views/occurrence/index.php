<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Occurrence;

$this->title = 'Ocorrências';
?>
<div class="occurrence-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php //Html::a('Create Occurrence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
    // echo GridView::widget([
    //     'dataProvider' => $dataProvider,
    //     'filterModel' => $searchModel,
    //     'columns' => [
    //         [
    //           'attribute' => 'protocol',
    //           'enableSorting' => true,
    //           'contentOptions'=>['style'=>'width: 5%;text-align:center'],
    //         ], 
    //         [
    //           'attribute' => 'created',
    //           'enableSorting' => true,
    //           'contentOptions'=>['style'=>'width: 5%;text-align:center'],
    //           'format' => ['date', 'php:d/m/Y'],
    //         ],             
    //         [
    //           'attribute' => 'subject',
    //           'enableSorting' => true,
    //           'value' => function($data) {
    //               return $data->getSubject(); // OR use magic property $data->requestedMounthValue;
    //           },
    //           'filter' => Occurrence::$Static_subject,
    //           'contentOptions'=>['style'=>'width: 50%;text-align:left'],
    //         ],         
    //         [
    //           'attribute' => 'returntype',
    //           'enableSorting' => true,
    //           'value' => function($data) {
    //               return $data->getReturntype();
    //           },
    //           'filter' => Occurrence::$Static_returntype,
    //           'contentOptions'=>['style'=>'width: 10%;text-align:center'],
    //         ],             
    //         'subject',
    //         [
    //           'attribute' => 'status',
    //           'enableSorting' => true,
    //           'value' => function($data) {
    //               return $data->getStatus();
    //           },
    //           'filter' => Occurrence::$Static_status,
    //           'contentOptions'=>['style'=>'width: 10%;text-align:center'],
    //         ], 
    //         // 'status_id',
    //         // 'created',
    //         // 'updated',
    //         // 'user_id',
    //         // 'updated_by',

    //         ['class' => 'yii\grid\ActionColumn'],
    //     ],
    // ]); 
    ?>
</div>