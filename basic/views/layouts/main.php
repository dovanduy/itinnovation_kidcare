<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => '<img src="images/logo.png" alt="KidCare" />',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items'=> [
                    // if not logged in
                    ['label'=>'Features', 'url'=>array('site/index'),
                        'visible'=>(!isset(Yii::$app->user->identity))],
                    ['label'=>'Product',  'url'=>array('#'),
                        'visible'=>(!isset(Yii::$app->user->identity))],
                    ['label'=>'Order now','url'=>array('site/contact'),
                        'visible'=>(!isset(Yii::$app->user->identity))],
                    ['label'=>'Login', 'url'=>array('site/login'),
                        'visible'=>(!isset(Yii::$app->user->identity))],

                    // if logged in
                    ['label'=>'Dashboard', 'url' => ['app/index'],
                        'visible'=>(isset(Yii::$app->user->identity)),
                        'linkOptions' => ['data-method' => 'post']],
                    ['label'=>'Filters', 'url' => ['app/filters'],
                        'visible'=>(isset(Yii::$app->user->identity)),
                        'linkOptions' => ['data-method' => 'post']],
                    ['label'=>'Insight', 'url' => ['app/insight'],
                        'visible'=>(isset(Yii::$app->user->identity)),
                        'linkOptions' => ['data-method' => 'post']],
                    ['label'=>'Real-time', 'url' => ['app/realtime'],
                        'visible'=>(isset(Yii::$app->user->identity)),
                        'linkOptions' => ['data-method' => 'post']],
                    ['label'=>'Mood Analysis', 'url' => ['app/mood'],
                        'visible'=>(isset(Yii::$app->user->identity)),
                        'linkOptions' => ['data-method' => 'post']],
                    ['label'=>'Settings', 'url' => ['app/settings'],
                        'visible'=>(isset(Yii::$app->user->identity)),
                        'linkOptions' => ['data-method' => 'post']],
                    ['label'=>'Logout', 'url'=>array('site/logout'),
                        'visible'=>(isset(Yii::$app->user->identity)),
                        'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; KidCare <?= date('Y') ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
