<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="//raw.github.com/botmonster/jquery-bootpag/master/lib/jquery.bootpag.min.js"></script>
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?php if (Yii::$app->user->isGuest) : ?>
            <div class="wrap <?= (Yii::$app->controller->action->id == 'register') ?  'wrapregister' : NULL ?> ">
                <nav role="navigation" class="navbar navbar-default navbar-fixed-top ">
                    <div class="nav-container">
                        <ul class="nav navbar-nav navbar-left">
                            <div class="social">
                                <li>
                                    <a href="https://www.facebook.com/"> <i class="fa fa-facebook-square"> </i> </a>
                                    <a href="https://foursquare.com/"> <i class="fa fa-foursquare"> </i> </a>
                                </li>       
                            </div>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo Url::to(['site/index']); ?>">Home</a></li>
                            <li><a href="<?php echo Url::to(['stock/shop']) ?>"> Shop </a></li>
                            <li><a href="<?php echo Url::to(['site/contact']) ?>"> Contact</a> </li>
                            <li><a href="<?php echo Url::to(['site/about']) ?>"> About Us </a> </li>
                            <li><a href="<?php echo Url::to(['site/login']) ?>"> Login </a></li>
                        </ul>
                    </div>
                </nav> 
                <div class="container">
                    <?= $content ?>
                </div>

            </div>
        <?php else: ?>

            <div class="wrap <?= (Yii::$app->controller->action->id == 'account') ?  'wrapregister' : NULL ?> ">
                <nav role="navigation" class="navbar navbar-default navbar-fixed-top navcolor ">
                    <div class="nav-container">
                        <ul class="nav navbar-nav navbar-left">
                            <div class="social">
                                <li>
                                    <a href="https://www.facebook.com/"> <i class="fa fa-facebook-square"> </i> </a>
                                    <a href="https://foursquare.com/"> <i class="fa fa-foursquare"> </i> </a>
                                </li>       
                            </div>
                        </ul>
                        <ul class="nav navbar-nav navbar-right inline">
                            <li><a href="<?php echo Url::toRoute(['site/index'], true); ?>">Home</a></li>
                            <li><a href="<?php echo Url::to(['stock/shop']); ?>"> Shop </a></li>
                            <li><a href="<?php echo Url::to(['stock/cart']); ?>"class="glyphicon glyphicon-shopping-cart" title="My Shopping Cart"></a></li>
                            <li><a href="<?php echo Url::to(['stock/checkout']); ?>">Checkout</a></li>
                            <li><a href="<?php echo Url::to(['site/contact']); ?>"> Contact </a></li>
                            <li><a href="<?php echo Url::to(['site/about']) ?>"> About Us </a> </li> 
                            <div class="navbar-header navbar-right pull-right">
                                <ul class="nav pull-left">
                                    <li class="dropdown pull-right">
                                        <a href="#" data-toggle="dropdown" class="dropdown-toggle dropdown-icon">
                                            <span class="glyphicon glyphicon-user"></span>
                                            <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu ">
                                            <li><a href="<?php echo Url::to(['site/account']); ?>"> Account </a></li>
                                            <li><a href="<?= Url::to(['site/logout']) ?>" data-method="post"> Logout </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </ul>
                    </div>
                </nav>
                <div class="container">
                    <?= $content ?>
                </div>
            </div>
        <?php endif; ?>
        <footer class="footer">
            <div class="container">
                <p class="pull-right">&copy; RosS <?= date('Y') ?></p>
            </div>
        </footer>
        <?php $this->endBody() ?>

    </body>

</html>
<?php $this->endPage() ?>


