<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OccurrenceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Occurrences';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="occurrence-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Occurrence', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'type_id',
            'return_by',
            'subject',
            'message:ntext',
            // 'status_id',
            // 'created',
            // 'updated',
            // 'user_id',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
