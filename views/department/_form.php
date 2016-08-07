<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="department-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'protocol')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'returntype')->textInput() ?>

    <?= $form->field($model, 'employee')->textInput() ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'updated')->textInput() ?>

    <?= $form->field($model, 'updated_by')->textInput() ?>

    <?= $form->field($model, 'answer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'reporter_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reporter_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reporter_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'reporter_celphone')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
