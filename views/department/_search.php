<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Occurrence;

?>

<div class="department-search">

    <?php $form = ActiveForm::begin([
        // 'options' => [
        //             'class' => 'form-inline',
        //             ],        
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <div class="row">
        <div class="col-md-3">
            <?php
                echo '<label class="control-label">Período</label>';
                echo DatePicker::widget([
                    'model' => $model,
                    'attribute' => 'start_date',
                    'attribute2' => 'end_date',
                    'language' => 'pt',
                    'type' => DatePicker::TYPE_RANGE,
                    'separator' => 'até',
                    'options' => [
                        'placeholder' => '',
                    ],
                    'pluginOptions' => [
                        'autoclose'=>true,
                        'todayHighlight' => true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]);
            ?>
        </div> 

        <div class="col-md-4">
        
        </div>

        <div class="col-md-4">
        <?php echo $form->field($model, 'reporter_name') ?>
        </div>
    </div>    

    
    <div class="form-group">
        <?= Html::submitButton('<span class="glyphicon glyphicon-filter" aria-hidden="true"></span> Filtrar', ['class' => 'btn btn-success']) ?>
        <?= Html::resetButton('<span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Limpar', ['class' => 'btn btn-default']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>
