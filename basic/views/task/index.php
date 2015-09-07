<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task', ['create'], ['class' => 'btn btn-default']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            [
                'label' => 'client',
                'value' => function($data){
                    return $data->client->site;
                }
            ],
            [
                'attribute' => 'task',
                'format' => 'html',
                'value' => function($data){
                    return $data->task." <span class='label label-primary'>".$data->price."</span>";
                }
            ],
            
            'dateCreated',
           

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
