<?php
$this->title = 'Shop';

use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<?php if (Yii::$app->user->isGuest) : ?>
    <div class="alert alert-danger shopalert" role="alert">
        <strong> If u are Guest , please </strong> <a href="<?php echo Url::to(['site/login']) ?>" class="alert-link"> Register / Login  </a>  <b> to the shop before u start shopping </b>
    </div>
    <div class="row">
        <div class="container">
            <ul class="loginshopul">
                <?php if ($stock < 1): ?>
                    <div> There is nothing for selling </div>
                <?php else: ?>
                    <?php foreach ($stock as $stocklist): ?>
                        <div class="col-sm-4 col-lg-4"> 
                            <div class="prod_box">
                                <div class="product_title" value="<?php $stocklist->stockname ?>" >  <?php echo $stocklist->stockname ?> </div>
                                <div class="product_img"><img src="https://s-media-cache-ak0.pinimg.com/736x/17/28/1a/17281adc745d17db1bf299679c4f0b8b.jpg" class="img-responsive"  ></div>
                                <div class="prod_price" value="<?php $stocklist->price ?>"> Buy now only for  <?php echo $stocklist->price ?>  $ </div>
                                <div class="prod_buy">
                                    <button type="button"  class="btn custombtn disabled">Buy</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <footer class="pagerlocation">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </footer>
<?php else: ?>
    <div class="row">
        <div class="container">
            <ul class="loginshopul">
                <?php if ($stock < 1): ?>
                    <div> There is nothing for selling </div>
                <?php else: ?>
                    <?php foreach ($stock as $stocklist): ?>
                        <div class="col-sm-4"> 
                            <div class="prod_box">
                                <div class="product_title"  value="<?php $stocklist->stockname ?>" >  <?php echo $stocklist->stockname ?> </div>
                                <div class="product_img"><img src="https://s-media-cache-ak0.pinimg.com/736x/17/28/1a/17281adc745d17db1bf299679c4f0b8b.jpg" class="img-responsive"  ></div>
                                <div class="prod_price"  value="<?php $stocklist->price ?>">   <?php echo $stocklist->price ?>  $ </div>
                                <div class="prod_buy">
                                    <button type="submit" value="<?= $stocklist->id ?>" class="custombtn" method='post'  title="Add to Cart" > Buy </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
    <footer class="pagerlocation">
        <?= LinkPager::widget(['pagination' => $pagination]) ?>
    </footer>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.custombtn').click(function () {
                var id = $(this).attr("value");
                console.log(id);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo Url::to(['stock/ajax']); ?>',
                    data: {id: id},
                    dataType: 'json'
                });
            });
        });
    </script>
<?php endif; ?>


