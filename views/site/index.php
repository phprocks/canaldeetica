<?php
use yii\helpers\Html;

$this->title = 'Sicoob Crediriodoce - '.Yii::$app->params['appName'];
?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::$app->params['appName'];?></h1>
<hr/>
<p class="text-justify">O Canal do Colaborador tem a finalidade de atuar como canal de comunicação entre a cooperativa e seus empregados e terceirizados, sendo possível o registro de denúncias, reclamações, elogios, sugestões e outros.</p>

<p class="text-justify">Sendo que as manifestações podem ser de forma confidencial e, se desejável anônima. Se este for o caso clique em "Relatar Ocorrência" ou em "Acompanhar Ocorrência" neste site.

Você deve descrever o máximo de informações possível para que o relato seja completo e detalhado, isso tornará a apuração da manifestação mais precisa e rápida. Não se esqueça de incluir no relato:</p>

<ul class="text-justify">
  <li>O quê (descrição da situação)</li>
  <li>Quem (nome e sobrenome das pessoas envolvidas, inclusive testemunhas)</li>
  <li>Quando (data em que aconteceu, acontece ou acontecerá a situação)</li>
  <li>Por quê (a causa ou motivo)</li>
  <li>Quanto (se for possível medir)</li>
  <li>Provas (se elas existem e onde podemos encontrá-las)</li>
</ul>

<p class="text-justify">Para garantir a independência no processo de apuração, se pertinente, indique no seu relato o envolvimento direto ou indireto das pessoas abaixo relacionadas, visto que serão elas que irão apurar o registro das manifestações:</p>

<h3>Membros do Comitê de Ética</h3>
<p>
<ul class="text-justify">
  <li>Um Representante do Conselho de Administração: Cantídio Carlos de França ou Décio Chaves</li>
  <li>Um Representante dos Controles Internos: Kelen Mendes ou Bianca Daré</li>
  <li>Um Representante da Classe dos Colaboradores, eleito pelos mesmos em eleição democrática: Marco Antônio ou Nicolina Martins</li>
  <li>Um Representante da Diretoria: Silas Dias ou Celso Mól</li>
  <li>Um Representante do Gestão de Pessoas: Fernanda Froes ou Marina Pereira</li>
</ul></p>

<p class="text-justify">Para acompanhar o andamento de sua denúncia, guarde o número do protocolo que lhe será fornecido após o registro do incidente. O prazo para resposta da sua denúncia é de até 15 dias úteis. Obrigado pela iniciativa e confiança.</p>

    <p>
    <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Relatar Ocorrência', ['/occurrence/create'], ['class'=>'btn btn-success']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Acompanhar Ocorrência', ['/occurrence/search'], ['class'=>'btn btn-success']) ?>
    </p>

    </div>
</div>