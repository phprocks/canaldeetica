<?php

use yii\helpers\Html;


$this->title = 'Alterar ocorrencia: ' . $model->id;
?>
<div class="occurrence-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_update', [
        'model' => $model,
    ]) ?>

</div>
