<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

/* @var $this yii\web\View */
/* @var $model app\models\Task */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->textInput() ?>
     
    <?//= $form->field($model, 'client_id')->dropDownList(ArrayHelper::map($clients,'id','site')) ?>

    <?= $form->field($model, 'task')->widget(TinyMce::className(),[
        'options' => ['rows' => 8],
    ]); ?>
    
    <?= $form->field($model, 'price')->textInput();?>
    
    <? if(!$model->dateCreated){
        echo $form->field($model, 'dateCreated')->textInput(['value' => date("Y-m-d H-i-s")]);
        }
    ?>

    <?= $form->field($model, 'archive')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
