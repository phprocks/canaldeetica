<?php
use yii\helpers\Html;

$this->title = 'Sicoob Crediriodoce - '.Yii::$app->params['appName'];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::$app->params['appName'];?></h1>
<hr/>
<p class="text-justify">O Canal do Colaborador tem a finalidade de atuar como canal de comunicação entre a cooperativa e seus empregados, sendo possível o registro de denúncias, elogios, reclamações, sugestões e outros.</p>

<p class="text-justify">Para acompanhar o andamento de sua manifestação, guarde o número do protocolo que lhe será fornecido após o registro da ocorrência. O número de protocolo gerado é aleatório impossibilitando que outro usuário tenha acesso à manifestação.</p>

<p class="text-justify">O prazo para resposta é de até 15 (quinze) dias úteis.</p>

<p class="text-justify">Caso queira que sua manifestação seja anônima, basta não preencher os campos de identificação.</p>
    <p>
    <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Relatar Ocorrência', ['/occurrence/create'], ['class'=>'btn btn-success']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Acompanhar Ocorrência', ['/occurrence/search'], ['class'=>'btn btn-success']) ?>
    </p>

    </div>
</div>