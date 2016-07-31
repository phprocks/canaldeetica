<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Occurrence;
?>

<div class="occurrence-form">

    <?php $form = ActiveForm::begin(); ?>

	<div class="row">
	  <div class="col-md-6"><?= $form->field($model, 'protocol')->textInput(['maxlength' => true,'readonly' => true, 'disabled' => true]) ?></div>
	  <div class="col-md-6"><?= $form->field($model, 'type')->dropDownList(Occurrence::$Static_type, ['readonly' => true, 'disabled' => true]) ?></div>
	</div>    

	<div class="row">
	  <div class="col-md-6"><?= $form->field($model, 'subject')->textInput(['maxlength' => true,'readonly' => true, 'disabled' => true]) ?></div>
	  <div class="col-md-6"><?= $form->field($model, 'returntype')->dropDownList(Occurrence::$Static_returntype,['readonly' => true, 'disabled' => true]) ?></div>
	</div>	

    <?= $form->field($model, 'message')->textarea(['rows' => 6,'readonly' => true, 'disabled' => true]) ?>

    <hr/>

	<?= $form->field($model, 'status')->dropDownList(Occurrence::$Static_status,['prompt'=>'--']) ?>  
	
	<?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enviar' : 'Enviar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>