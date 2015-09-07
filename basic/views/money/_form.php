<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Client;

/* @var $this yii\web\View */
/* @var $model app\models\Money */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="money-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->dropDownList(
        Client::find()->select(['site', 'id'])->indexBy('id')->orderBy(['site' => SORT_ASC])->column()
    ) ?>

    <?= $form->field($model, 'price')->textInput(['type' => 'tel']) ?>

    <?= $form->field($model, 'status')->textInput(['value' => '2']) ?>

    <? if(!$model->dateContract){
        echo $form->field($model, 'dateContract')->textInput(['value' => date("Y-m-d H-i-s")]);
        }
    ?>

    <?= $form->field($model, 'datePay')->textInput(['value' => date("Y-m-d H-i-s")]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
