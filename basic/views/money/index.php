<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MoneySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Moneys';
$this->params['breadcrumbs'][] = $this->title;

$months = [
  'January',
  'February', 
  'March',
  'April',
  'May',
  'June',
  'July',
  'August',
  'September',
  'October',
  'November',
  'December',
];
?>
<div class="money-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Money', ['create'], ['class' => 'btn btn-default']) ?>
    </p>
<div class="col-md-3 col-xs-3">
<div class="list-group">
<?
foreach($months as $item){
    if ($item == date('F')) $active = 'active'; else $active = ''; 
    echo Html::a($item,'',['class' => 'list-group-item '.$active]);
}
?>
</div>
</div>

<div class="col-md-9 col-xs-9">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'columns' => [
        

            
            [
                'label' => 'client',
                'value' => function($data){
                    return $data->client->site;
                }
            ],
            'price',
         
            
             'datePay',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

</div>
