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
          Detalhes do incidente
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <!-- --- -->
	<div class="row">
	  <div class="col-md-6">
	  <?= $form->field($model, 'location')->dropDownList(Occurrence::$Static_location,['prompt'=>'--']) ?>
	  </div>
	</div>
  <div class="row">
    <div class="col-md-6">
    <?= $form->field($model, 'subject')->dropDownList(Occurrence::$Static_subject,['prompt'=>'--',
      'onchange' => 'if($(this).val() == 0) {
          $("#mydiv").show();
    }else if($(this).val() == 1) {
          $("#mydiv").show();
    }else if($(this).val() == 2){
        $("#mydiv").hide();
    }else if($(this).val() == 3) {
        $("#mydiv").hide();
    }else if($(this).val() == 4){
        $("#mydiv").show();
    }'
    ]) ?>
    </div>
  </div>

    <div id="mydiv" style="display: none;">
<div class="row">
<div class="col-md-12 text-justify alert alert-warning" >
<p>Caso queira que sua manifestação seja anônima, basta não preencher os campos de identificação. Neste caso, a única maneira de acompanhar a ocorrência, é através do protocolo gerado, inserindo-o no campo “número do protocolo” no item “acompanhar ocorrência”.</p>

<p>As ocorrências não podem ser rastreadas, visto que nenhuma informação do computador utilizado é capturada ou armazenada.</p>

<p>Você deve descrever o máximo de informações possível para que o relato seja completo e detalhado, isso tornará a apuração da manifestação mais precisa e rápida. Não se esqueça de incluir no relato:</p>

<p><ul>
  <li>O quê (descrição da situação)</li>
  <li>Quem (nome e sobrenome das pessoas envolvidas, inclusive testemunhas)</li>
  <li>Quando (data em que aconteceu, acontece ou acontecerá a situação)</li>
  <li>Por quê (a causa ou motivo)</li>
  <li>Quanto (se for possível medir)</li>
  <li>Provas (se elas existem e onde podemos encontrá-las)</li>
</ul></p>

<p>O Comitê de Ética irá apurar o registro das manifestações. Para garantir a isenção no processo de apuração, se pertinente, indique no seu relato o envolvimento direto ou indireto dos membros do Comitê de Ética abaixo relacionados, para que não participe do processo de apuração e análise da manifestação.</p>

<p>Membros do Comitê de Ética:</p>

<p><ul>
  <li>Um Representante do Conselho de Administração: Cantídio Carlos de França ou Décio Chaves</li>
  <li>Um Representante dos Controles Internos: Kelen Mendes ou Bianca Daré</li>
  <li>Um Representante da Classe dos Colaboradores, eleito pelos mesmos em eleição democrática: Marco Antônio ou Nicolina Martins</li>
  <li>Um Representante da Diretoria: Silas Dias ou Celso Mól</li>
  <li>Um Representante do Gestão de Pessoas: Fernanda Fróes ou Marina Pereira</li>
<ul></p>

</div></div>
    </div>


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