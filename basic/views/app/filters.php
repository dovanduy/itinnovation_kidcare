<?php
use yii\helpers\Html;
?>
<h1>Filters</h1>
By setting a filter, you can choose to get notified one your child is typing one of the filtered words.
Either set your own filter, or enable one of KidCare's filter lists.

<hr/>

<div class="row">
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3>Pornography filter</h3>
                <div class="well">
                    Apply this filter to get notified on detection of adult-related content.
                </div>
                <?php if($filterlists->getAttribute('pornography')){ ?>
                <a href="index.php?r=app%2Ftogglefilter&filter=pornography" class="btn btn-success" role="button">
                    Enabled <i class="glyphicon glyphicon-eye-open"></i>
                </a><?php } else{ ?>
                <a href="index.php?r=app%2Ftogglefilter&filter=pornography" class="btn btn-danger" role="button">
                    Disabled <i class="glyphicon glyphicon-eye-close"></i>
                </a><?php } ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3>Webshop Protection</h3>
                <div class="well">
                    Apply this filter to get notified on online purchases and potential use of credit cards.
                </div>
                <?php if($filterlists->getAttribute('webshop')){ ?>
                <a href="index.php?r=app%2Ftogglefilter&filter=webshop" class="btn btn-success" role="button">
                    Enabled <i class="glyphicon glyphicon-eye-open"></i>
                </a><?php } else{ ?>
                <a href="index.php?r=app%2Ftogglefilter&filter=webshop" class="btn btn-danger" role="button">
                    Disabled <i class="glyphicon glyphicon-eye-close"></i>
                </a><?php } ?>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3>Games filter</h3>
                <div class="well">
                    Apply this filter to get notified when your child is playing games, instead of doing homework.
                </div>
                <?php if($filterlists->getAttribute('games')){ ?>
                <a href="index.php?r=app%2Ftogglefilter&filter=games" class="btn btn-success" role="button">
                    Enabled <i class="glyphicon glyphicon-eye-open"></i>
                </a><?php } else{ ?>
                <a href="index.php?r=app%2Ftogglefilter&filter=games" class="btn btn-danger" role="button">
                    Disabled <i class="glyphicon glyphicon-eye-close"></i>
                </a><?php } ?>
            </div>
        </div>
    </div>
    <hr/>
    <div class="col-md-12">
        <h3>Keyword filters</h3>
        <table class="table table-striped">
            <tr><th>Keyword</th><th>Action</th><th></th></tr>
            <?php foreach($filters as $filter){?>
            <tr><td><?=$filter->keyword?></td>
                <td><?=$filter->alerttype?></td>
                <td><a href="index.php?r=app%2Fdeletefilter&id=<?=$filter->id?>"
                       class="btn btn-sm btn-danger pull-right">delete</a></td>
            <?php } ?>
        </table>
        <a href="index.php?r=app%2Fcreatefilter" class="btn btn-default">Add keyword</a>
    </div>
</div>