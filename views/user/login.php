<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Autenticação';
?>
<div class="user-default-login">

    <h1><?= Html::encode($this->title) ?></h1>


    Informe seus dados de acesso
    <br/>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-7\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],

    ]); ?>

    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>

            <br/><br/>
            Caso não possua, <?= Html::a("clique aqui para criar", ["/user/register"]) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if (Yii::$app->get("authClientCollection", false)): ?>
        <div class="col-lg-offset-2 col-lg-10">
            <?= yii\authclient\widgets\AuthChoice::widget([
                'baseAuthUrl' => ['/user/auth/login']
            ]) ?>
        </div>
    <?php endif; ?>

</div>
