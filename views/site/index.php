<?php
use yii\helpers\Html;

$this->title = 'Sicoob Crediriodoce - Cana de Ética';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Canal de Ética!</h1>

    <p class="lead">

    O canal de Ouvidoria Sicoob tem a finalidade de atuar como canal de comunicação entre as cooperativas e os usuários dos produtos e serviços, que já tiveram acesso aos canais de atendimentos habituais e não ficaram satisfeitos com a solução.
    </p><p>
    Dessa forma, antes do registro de sua manifestação, orientamos a entrar em contato com sua cooperativa de relacionamento ou com os canais de atendimento disponibilizados pelo Sicoob:
    </p>

    <p>
    <?= Html::a('<span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Registrar Mensagem', ['/user/register'], ['class'=>'btn btn-success']) ?>
    <?= Html::a('<span class="glyphicon glyphicon-search" aria-hidden="true"></span> Consultar Mensagem', ['/user/login'], ['class'=>'btn btn-success']) ?>
    </p>

    </div>
</div>