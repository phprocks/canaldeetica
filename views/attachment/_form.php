<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\data\SqlDataProvider;
?>

<?php
$t = Yii::$app->getRequest()->getQueryParam('id');
    $cod = $model->id;
    $dataProvider = new SqlDataProvider([
        'sql' => "SELECT a.id, a.name as arquivo, occurrence_id
        FROM attachment a
        WHERE a.occurrence_id =  $t",
        'totalCount' => 200,
        'sort' =>false,
        'key'  => 'id',
        'pagination' => [
            'pageSize' => 200,
        ],
    ]);
?>
<div class="attachment-form">

	<?php 
		    if ($dataProvider->count < Yii::$app->params['imglimit']) {

    $form = ActiveForm::begin([
		        'id' => 'attachmentsform',
		        'options' => [
		            'enctype'=>'multipart/form-data',
		            ],
		    ]);

    echo $form->field($model, 'file')->fileInput(['maxlength' => true]);

    echo Html::activeHiddenInput($model, 'occurrence_id', ['value' => $t]);

   	echo Html::submitButton($model->isNewRecord ? 'Enviar' : 'Enviar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);

    ActiveForm::end();

	} else {
		echo "<div class=\"alert alert-warning\" role=\"alert\">Você anexou a quantidade máxima de arquivos permitido!</div>";
	}
	 ?>

    <hr/>
    </p>
    <ul>
      <li>Você pode adicionar até <strong><?php echo Yii::$app->params['imglimit'];?></strong> arquivos (Você ja adicionou <?php echo $dataProvider->count;?>)</li>
      <li>As extensões de arquivos permitidas são: <strong>jpg, png, jpeg, doc, docx, pdf, xls, xlsx</strong></li>
      <li>O tamanho máximo permitido é <strong>4 MB</strong></li>
      <li>O nome do arquivo será codificado ao realizar o upload</li>
    </ul>     

</div>