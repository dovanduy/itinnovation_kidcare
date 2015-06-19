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
                            echo GoogleChart::widget(array('visualization' => 'PieChart',
                                'data' => array(
                                    array('Task', 'Hours per Day'),
                                    array('Neutral', $mood->getAttribute('neutral')),
                                    array('Positive', $mood->getAttribute('positive')),
                                    array('Negative', $mood->getAttribute('negative'))
                                ),
                                'options' => array(
                                    'title' => 'Sentiment Analysis Graph',
                                    'slices' => [ '1' => [ 'color' => 'green' ],
                                                  '0' => [ 'color' => 'blue',
                                                  '2' => [ 'color' => 'red' ]]
                                    ]
                                )));
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
                Place the device preferably between the pc of your child and the power outlet. Then, the device must be enabled at any time the computer is used, and so you have the most insight in your child's behaviour as possible.
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
                    <tr><td>Last action:</td><td><?=$lastItem?></td></tr>
                    <tr><td>Device:</td><td><span class="label label-success">Online</span></td></tr>
                    <tr><td>Mood: </td><td><?php
                            $max = max([$mood->getAttribute('neutral'),
                                $mood->getAttribute('positive'),
                                $mood->getAttribute('negative')]);
                            if($mood->getAttribute('negative') == $max){
                                echo 'Negative';
                            }
                            elseif($mood->getAttribute('positive') == $max){
                                echo 'Positive';
                            }
                            else{
                                echo 'Neutral';
                            }
                            ?></td></tr>
                </table>
            </div>
        </div>
    </div>

</div>