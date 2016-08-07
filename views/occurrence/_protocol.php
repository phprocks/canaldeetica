<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="occurrence-search">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'form-inline',
            ],
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-4">

    <?= $form->field($model, 'protocol')->textInput(['size' => 10,'maxlength' => 8])->label('Digite o número do protocolo') ?>

    	</div>

	    <div class="form-group">
	        <?= Html::submitButton('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Enviar', ['class' => 'btn btn-success']) ?>
	    </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
