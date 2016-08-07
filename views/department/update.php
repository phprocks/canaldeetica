<?php

use yii\helpers\Html;

$this->title = 'Alterar ocorrencia: ' . $model->id;
?>
<div class="department-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
