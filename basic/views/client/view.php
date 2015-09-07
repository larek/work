<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Client */

$this->title = "Client ".$model->site;
$this->params['breadcrumbs'][] = ['label' => 'Clients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="client-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'image',
            'site',
        ],
    ]) ?>
    
    <?= GridView::widget([
        'dataProvider' => $taskDataProvider,
        'columns' => [
            'id',
            'task:html',
            'dateCreated',
            [
                'format' => 'html',
                'value' => function($data){
                    return Html::a("<span class='glyphicon glyphicon-pencil'></span>",['task/update', 'id'=>$data->id]);
                }
            ],
            
        ]
    ]);?>

</div>
