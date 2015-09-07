<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Costs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cost-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cost', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br />
    <p>Общая сумма расходов — <?= $sum;?></p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [

            'category',
            [   
                'label' => 'money',
                'value' => function($data){
                    return $data->getSum($data->category);
                }
            ],

        ],
    ]); ?>


</div>
