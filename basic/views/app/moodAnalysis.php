<h1>Mood Analysis</h1>
<p>The sentiment analysis shows the mood of your child according to search terms and used keywords, and the comparison of these keywords with
scientific backed analysis. Green indicates a positive mood, orange a neutral mood, and orange colors a negative mood.</p>

<div class="row">
    <div class="col-md-6">
        <table class="table table-striped">
            <tr><th>Date/time</th><th>Observation</th></tr>
            <?php foreach($mood as $temper){ ?>
                <td><?=$temper->getAttribute('timestamp')?></td>
                <td>
                    <div class="progress">
                        <div class="progress-bar progress-bar-success" style="width: <?=$temper->getAttribute('positive')*100?>%">
                        </div>
                        <div class="progress-bar progress-bar-primary" style="width: <?=$temper->getAttribute('neutral')*100?>%">
                        </div>
                        <div class="progress-bar progress-bar-warning" style="width: <?=$temper->getAttribute('negative')*100?>%">
                        </div>
                    </div>
                </td>
            <?php } ?>
        </table>
    </div>
    <div class="col-md-6">
        <div class="thumbnail">
            <?php
            use scotthuangzl\googlechart\GoogleChart;
            echo GoogleChart::widget(array('visualization' => 'PieChart',
                'data' => array(
                    array('Task', 'Sentiment analysis'),
                    array('Neutral', $temper->getAttribute('neutral')*100),
                    array('Positive', $temper->getAttribute('positive')*100),
                    array('Negative', $temper->getAttribute('negative')*100)
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