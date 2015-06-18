<?php
// register javascript interaction
$this->registerJsFile(Yii::$app->request->baseUrl.'/js/realtime.js',
                      ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<h1>Realtime</h1>
<div class="row">
    <div class="col-md-9">
        <div class="well realtime">
            <ul>
                <li><code>Listening...</code></li>
            </ul>
        </div>
    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Realtime typing
            </div>
            <div class="panel-body">
                When your child is typing, his behaviour is analyzed. The printed characters and our observations are displayed on this page.
            </div>
        </div>
    </div>
</div>