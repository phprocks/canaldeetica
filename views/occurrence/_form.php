<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Occurrence;
?>

<div class="occurrence-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Detalhes da Mensagem
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <!-- --- -->
	<div class="row">
	  <div class="col-md-4">
	  <?= $form->field($model, 'type')->dropDownList(Occurrence::$Static_type,['prompt'=>'--']) ?>
	  </div>
	  <div class="col-md-4">
	  <?= $form->field($model, 'returntype')->dropDownList(Occurrence::$Static_returntype,['prompt'=>'--']) ?>
	  </div>
	  <div class="col-md-4">
	  <?= $form->field($model, 'location')->dropDownList(Occurrence::$Static_location,['prompt'=>'--']) ?>
	  </div>
	</div>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

      <!-- --- -->
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Clique aqui caso deseje se identificar
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
	    <?= $form->field($model, 'reporter_name')->textInput(['maxlength' => true]) ?>

	    <?= $form->field($model, 'reporter_email')->textInput(['maxlength' => true]) ?>

      <?= $form->field($model, 'reporter_phone')->widget(\yii\widgets\MaskedInput::classname(), ['mask' => ['(99)99999-9999'],]) ?>

      <?= $form->field($model, 'reporter_celphone')->widget(\yii\widgets\MaskedInput::classname(), ['mask' => ['(99)99999-9999'],]) ?>
      </div>
    </div>
  </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Gravar' : 'Gravar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>