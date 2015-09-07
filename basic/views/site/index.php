<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
$this->title = 'WorkUnicodePro';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>WORK</h1>
        <p><img src="/images/unicode_logo.png" /></p>
        
        
    </div>

    <div class="body-content">
    

        <div class="row">
            <div class="col-xs-12">
                <h2>Money <?= date("Y");?></h2>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Months</th><th>Revenues</th><th><?= Html::a('Costs',['cost/all'])?></th>
                    </tr>
                </thead>
                <?
                foreach($moneyPayYear as $key=>$value){
                    echo "<tr><td>$key</td><td>$value[revenue]</td><td>$value[cost]</td></tr>";
                }
                ?>
                </table>
                

                <p><?= Html::a('Moneys &raquo;',['money/index'],['class'=>'btn btn-default'])?></p>
            </div>        
            

        </div>

    </div>
</div>
