<h1>Dashboard</h1>
<div class="row">

    <div class="col-md-9">

        <div class="panel panel-default">
            <div class="panel-heading">
                Analytics
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <?php
                            use scotthuangzl\googlechart\GoogleChart;

                            echo GoogleChart::widget(array('visualization' => 'LineChart',
                                'data' => array(
                                    array('Task', 'Hours per Day'),
                                    array('Work', 11),
                                    array('Eat', 2),
                                    array('Commute', 2),
                                    array('Watch TV', 2),
                                    array('Sleep', 7)
                                ),
                                'options' => array('title' => 'PC Use')));
                            ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="thumbnail">
                            <?php
                            echo GoogleChart::widget(array('visualization' => 'PieChart',
                                'data' => array(
                                    array('Task', 'Hours per Day'),
                                    array('Neutral', 52),
                                    array('Positive', 36),
                                    array('Negative', 22)
                                ),
                                'options' => array('title' => '5-day Sentiment Analysis')));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                Installation help
            </div>
            <div class="panel-body">
                ??? Description of how the device works and how to install ???
            </div>
        </div>

    </div>

    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading">
                Summary
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr><td>Last action:</td><td>17:53</td></tr>
                    <tr><td>Device:</td><td><span class="label label-success">Online</span></td></tr>
                    <tr><td>Filters active:</td><td>2</td></tr>
                    <tr><td>Mood: </td><td>normal</td></tr>
                </table>
            </div>
        </div>
    </div>

</div>