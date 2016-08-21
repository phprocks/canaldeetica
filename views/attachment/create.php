<?php

use yii\helpers\Html;

$this->title = 'Incluir Anexos';
?>
<div class="attachment-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <hr/>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
