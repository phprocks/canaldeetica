<?php
use yii\helpers\Html;

$this->title = 'Sicoob Crediriodoce - Cana de Ética';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Canal de Ética </h1>

   
Este é um canal exclusivo para relato de situações de descumprimento do Código de Ética do Sicoob Crediriodoce, de forma confidencial e, se desejável anônima. Se este for o caso clique em "Relatar Incidente" ou em "Acompanhar Incidente" neste site.

Para outras finalidades, o Sicoob Crediriodoce disponibiliza os seguintes canais de comunicação:


<address>
  <strong>Central de Relacionamento</strong><br>
Central de Atendimento Sicoob 0800 642 0000<br>
Cartões Sicoobcard 0800 702 0756<br>
</address>

<address>
  <strong>SAC SICOOB </strong><br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 642 0000<br>
Dúvidas relacionadas ao uso dos canais de autoatendimento. Funciona 24 horas, todos os dias da semana.
</address>

<address>
  <strong>SAC BANCOOB </strong><br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span>– 0800 724 4420<br>
Poupança, Previdência, Crédito Consignado INSS, Privado e Servidor Público, Procapcred, Cotas-Partes, Fundos de Investimento, além de boletos fraudados e rastreamento de cheques.
</address>

<address>
  <strong>SAC SICOOB CONSÓRCIOS</strong><br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 607 3 636 (demais regiões) ou<br> 
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 4007 1905 (capitais e regiões metropolitanas).<br>
Para dúvidas e informações específicas sobre o produto.
</address>

<address>
  <strong>SAC CARTÕES</strong><br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 702 0756 (demais regiões) ou <br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 007 1256 (regiões metropolitanas).<br>
Dúvidas, roubo ou perda do cartão. Atendimento 24 horas, sete dias por semana.
</address>

<address>
  <strong>Ouvidoria</strong><br>
<span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> – 0800 725 0996<br>
</address>

Aqui você deve descrever qual foi a situação em que houve o descumprimento. É importante que o relato seja completo e detalhado, pois isso tornará a apuração da denúncia mais precisa e rápida. Não se esqueça de incluir no relato:
    * O quê (descrição da situação)
    * Quem (nome e sobrenome das pessoas envolvidas, inclusive testemunhas)
    * Quando (data em que aconteceu, acontece ou acontecerá a situação)
    * Por quê (a causa ou motivo)
    * Quanto (se for possível medir)
    * Provas (se elas existem e onde podemos encontrá-las)
Para garantir a independência no processo de apuração, se pertinente, indique no seu relato o envolvimento direto ou indireto das pessoas abaixo relacionadas:

Membros do Comitê de Ética
    - Um Representante do Conselho de Administração: Cantídio Carlos de França ou Décio Chaves
    - Um Representante dos Controles Internos: Kelen Mendes ou Bianca Daré
    - Um Representante da Classe dos Colaboradores, eleito pelos mesmos em eleição democrática: Marco Antônio ou Nicolina Martins
    - Um Representante da Diretoria: Silas Dias ou Celso Mól
    - Um Representante do Gestão de Pessoas: Fernanda Froes ou Marina Pereira

Para acompanhar o andamento de sua denúncia, guarde o número do protocolo que lhe será fornecido após o registro do incidente. O prazo para resposta da sua denúncia é de até 15 dias úteis.
Obrigado pela iniciativa e confiança.
    

    <p>
    <?= Html::a('<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Relatar Incidente', ['/occurrence/create'], ['class'=>'btn btn-success']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Acompanhar Incidente', ['/occurrence/search'], ['class'=>'btn btn-success']) ?>
    </p>

    </div>
</div>