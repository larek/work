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
            <div class="col-xs-4">
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
            <div class="col-xs-4">
                <h2>Clients <?=$client?></h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><?= Html::a('Clients list &raquo;',['client/index'],['class'=>'btn btn-default'])?></p>
            </div>
            <div class="col-xs-4">
                <h2>Tasks <?=$task?></h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><?= Html::a('Tasks list &raquo;',['task/index'],['class'=>'btn btn-default'])?></p>
            </div>

        </div>

    </div>
</div>
