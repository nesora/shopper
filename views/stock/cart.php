<?php
$this->title = 'Shopping Cart';
?>
<div class="container">  
    <form method="post">
        <div class="jumbotron">
            <div class="container text-center">
                <h3>Shopping Cart</h3>     
                <table  class="table table-striped" >
                    <tr>
                        <th class="items" > Product </th> 
                        <th class="items middle-th ">  Quantity </th>
                        <th> Total Cost </th> 
                        <th> </th> 
                    </tr>
                    <?php foreach ($selectedItems as $item): ?>
                        <tr class="product" data-price="<?= $item->price ?>" data-id="<?= $item->id ?>">
                            <th class="items"><?= $item->stockname ?></th>
                            <th id="price" class="items middle-th "> 
                                <div >
                                    <button type="button" class="sub" title="If u want less quantity">-</button>
                                    <input class="quantityTxt quantity " id="quantity" name="quantity" type="text" value="1" onchange="quantityChange(this)" > 
                                    <button type="button" class="add" title="If u want more quantity" >+</button>
                                </div>
                            </th>
                            <th>       
                                <span class="productTotal"></span>       
                            </th>
                            <th id="price" class="items">
                                <button class="remove_field" data-value="<?= $item->price ?>" title="Click to delete product" >
                                    <div class="glyphicon glyphicon-trash" ></div>
                                </button>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <div class="row-fluid well">
                    <strong id="total"> Total: &euro; <span id="sum"> </span> </strong></div>
                <div class="payment">
                    <h2>Payment Information</h2>
                    <fieldset class="userinfo">
                        <label> First Name : <?php echo $model->firstname ?> </label>
                        <br>
                        <label> Last Name :  <?php echo $model->lastname ?></label>
                        <br>
                        <label> Country : <?php echo $model->country ?></label>
                        <br>
                        <label> City : <?php echo $model->city ?></label>
                        <br>
                        <label> Address : <?php echo $model->address ?> </label>
                        <br>
                    </fieldset>
                    <label class="radiotext">
                        <input type="radio" id="blankRadio1" checked="checked">  Payment Upon Delivery  
                    </label> 
                    <br>
                    <button class="btn btn-success" type="submit"> Submit </button>
                    <input type="hidden" value="" name="_csrf">
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    //delete row with product that the user want to delete , and after deleting the row , reduce the total cost for all products
    $('table').on('click', 'button.remove_field', function () {
        $(this).closest('tr').remove();
        var id = $(this).attr('data-value');
        updateTotal();
    });
//buttons for plus and minus for quantity
    $('.add').click(function () {
        var target = $('.quantity', this.parentNode)[0];
        target.value = +target.value + 1;
        updateTotal();
    });
    $('.sub').click(function () {
        var target = $('.quantity', this.parentNode)[0];
        if (target.value > 1) {
            target.value = +target.value - 1;
        }
        updateTotal();
    });
    //update the cost for each product and give total cost
    var updateTotal = function () {
        var sum = 0;
        //Add each product price to total
        $(".product").each(function () {
            var price = $(this).data('price');
            var id = $(this).data('id');
            var quantity = $('.quantityTxt', this).val();
            //Total for one product
            var subtotal = price * quantity;
            //Round to 2 decimal places.
            subtotal = subtotal.toFixed(2);
            //Display subtotal in HTML element
            $('.productTotal', this).html(subtotal);
            $('.payment').append('<input type="hidden" name="quantity[' + id + '][subtotal]" value="' + subtotal + '">');
            $('.payment').append('<input type="hidden" name="quantity[' + id + '][quantity]" value="' + quantity + '">');
        });
        // total
        $('.productTotal').each(function () {
            sum += Number($(this).html());
        });
        $('#sum').html(sum.toFixed(2));
    };
    //Update total when quantity changes
    $(".product").keyup(function () {
        updateTotal();
    });
    //Update totals when page first loads
    updateTotal();
    // set this from local
    $('span.productTotal').each(function () {
        $(this).before("&euro;");
    });
    // unit price
    $('.product').each(function () {
        var $price = $(this).parents("div").data('price');
        $(this).before($price);
    });
</script>



