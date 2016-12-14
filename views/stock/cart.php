<?php
$this->title = 'Shopping Cart';

use yii\helpers\Html;
?>
<div class="container">  
    <div class="jumbotron">
        <div class="container text-center">
            <h3>Shopping Cart</h3>     
            <table  class="table table-striped" >
                <tr>
                    <th> Product </th> 
                    <th> Price of product </th>
                    <th></th>
                </tr>
                <tr>
                    <th> <?php ?> </th> 
                    <th> 3$ </th>
                    <th>
                        <button class="remove_field " title="Click to delete product" >
                            <div class="glyphicon glyphicon-trash" ></div>
                        </button>
                    </th>
                </tr>
                <tr>
                    <th></th> 
                    <th> Total Cost : $ </th>
                    <th></th>
                </tr>
            </table>
            <?= Html::a('Return to Shop', ['/stock/shop'], ['class' => 'btn btn-default']) ?>
            <?= Html::a('Update', ['/stock/cart'], ['class' => 'btn btn-default']) ?>
            <?= Html::a('Checkout', ['/stock/checkout'], ['class' => 'btn btn-default']) ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('click', 'button.remove_field', function () {
        $(this).closest('tr').remove();
    });
</script>



