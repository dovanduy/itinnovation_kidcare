<h1>Insight</h1>
<div class="row">
    <div class="col-md-6">
        <div class="well realtime">
           <?php foreach(array_reverse($logitems) as $item){ ?>
                <small><strong><?=$item->getAttribute('timestamp')?></strong> -
                <?=$item->getAttribute('characters')?></small><br/>
           <?php } ?>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Explanation
            </div>
            <div class="panel-body">
                The left panel shows all events KidCare registered in the past.
                Below all alerts that have been sent.
            </div>
        </div>

        <h4>Alerts</h4>
        <table class="table table-striped">
            <tr><td>Date/time</td><td colspan="2">Message</td></tr>
            <?php foreach($alerts as $alert){ ?>
                <tr><td><small><?=$alert->getAttribute('timestamp')?></small></td>
                    <td><?=$alert->getAttribute('message')?></td>
                    <td><?=$alert->getAttribute('alertType')?></td></tr>
            <?php } ?>
        </table>
    </div>

</div>