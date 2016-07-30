<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Occurrence */

$this->title = 'Create Occurrence';
$this->params['breadcrumbs'][] = ['label' => 'Occurrences', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="occurrence-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
