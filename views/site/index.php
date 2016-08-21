<?php
use yii\helpers\Html;

$this->title = 'Sicoob Crediriodoce - Cana de Ética';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Canal de Ética </h1>

<p class="text-justify">Este é um canal exclusivo para relato de situações de descumprimento do Código de Ética do Sicoob Crediriodoce, de forma confidencial e, se desejável anônima. Se este for o caso clique em <?= Html::a('"Relatar Incidente"', ['/occurrence/create']) ?> ou em <?= Html::a('"Acompanhar Incidente"', ['/occurrence/search']) ?> neste site.

Para outras finalidades, o Sicoob Crediriodoce disponibiliza os seguintes canais de comunicação:
</p>

<div class="row">
  <div class="col-md-6">

<address>
  <h3>Central de Relacionamento</h3>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> –  0800 642 0000 - Central de Atendimento<br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> –  0800 702 0756 - Cartões Sicoobcard <br>
</address>

<address>
  <h3>SAC Sicoob</h3>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 642 0000<br>
<small>Dúvidas relacionadas ao uso dos canais de autoatendimento. Funciona 24 horas, todos os dias da semana.</small>
</address>

<address>
  <h3>SAC Bancoob </h3>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>– 0800 724 4420<br>
<small>Poupança, Previdência, Crédito Consignado INSS, Privado e Servidor Público, Procapcred, Cotas-Partes, Fundos de Investimento, além de boletos fraudados e rastreamento de cheques.</small>
</address>

  </div>
  <div class="col-md-6">

<address>
  <h3>SAC Sicoob Consórcios</h3>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 607 3 636 (demais regiões) ou<br> 
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 4007 1905 (capitais e regiões metropolitanas).<br>
<small>Para dúvidas e informações específicas sobre o produto.</small>
</address>

<address>
  <h3>SAC Cartões</h3>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 702 0756 (demais regiões) ou <br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 007 1256 (regiões metropolitanas).<br>
<small>Dúvidas, roubo ou perda do cartão. Atendimento 24 horas, sete dias por semana</small>
</address>

<address>
  <h3>Ouvidoria</h3>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 725 0996<br>
</address>

  </div>
</div>

<p class="text-justify">Aqui você deve descrever qual foi a situação em que houve o descumprimento. É importante que o relato seja completo e detalhado, pois isso tornará a apuração da denúncia mais precisa e rápida. Não se esqueça de incluir no relato:</p>

<ul class="text-justify">
  <li>O quê (descrição da situação)</li>
  <li>Quem (nome e sobrenome das pessoas envolvidas, inclusive testemunhas)</li>
  <li>Quando (data em que aconteceu, acontece ou acontecerá a situação)</li>
  <li>Por quê (a causa ou motivo)</li>
  <li>Quanto (se for possível medir)</li>
  <li>Provas (se elas existem e onde podemos encontrá-las)</li>
</ul>

<p class="text-justify">
Para garantir a independência no processo de apuração, se pertinente, indique no seu relato o envolvimento direto ou indireto das pessoas abaixo relacionadas:</p>

<h3>Membros do Comitê de Ética</h3>
<ul class="text-justify">
  <li>Um Representante do Conselho de Administração: Cantídio Carlos de França ou Décio Chaves</li>
  <li>Um Representante dos Controles Internos: Kelen Mendes ou Bianca Daré</li>
  <li>Um Representante da Classe dos Colaboradores, eleito pelos mesmos em eleição democrática: Marco Antônio ou Nicolina Martins</li>
  <li>Um Representante da Diretoria: Silas Dias ou Celso Mól</li>
  <li>Um Representante do Gestão de Pessoas: Fernanda Froes ou Marina Pereira</li>
</ul>

<p class="text-justify">
Para acompanhar o andamento de sua denúncia, guarde o número do protocolo que lhe será fornecido após o registro do incidente. O prazo para resposta da sua denúncia é de até 15 dias úteis.
Obrigado pela iniciativa e confiança.</p>
    

    <p>
    <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Relatar Incidente', ['/occurrence/create'], ['class'=>'btn btn-success']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Acompanhar Incidente', ['/occurrence/search'], ['class'=>'btn btn-success']) ?>
    </p>

    </div>
</div>