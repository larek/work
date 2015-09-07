<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cost;

/* @var $this yii\web\View */
/* @var $model app\models\Cost */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cost-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'money')->textInput(['type' => 'tel']) ?>
    
    <?= $form->field($model, 'category')->dropDownList(
        Cost::find()->select(['category', 'id'])->indexBy('category')->groupBy('category')->column()
    ); ?>

    <?= $form->field($model, 'date')->textInput(['value' => date('Y-m-d H-i-s')]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
