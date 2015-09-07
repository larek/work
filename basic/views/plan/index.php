<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
$this->title = 'Plan';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Plan</h1>

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
    ]
]);?>