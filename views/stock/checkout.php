<?php
$this->title = 'Checkout';
?>
<div class="jumbotron">
    <div class="container text-center">
        <div class="checkout-form">
            <div class="form-fields">
                <div class="payment">
                    <h2>Payment Information</h2>
                    <form>
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
                        <label class="radiotext"><input type="radio" id="blankRadio1" checked="checked">  Payment Upon Delivery   </label> 
                        <br>
                        <button class="btn btn-success"> Submit </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>






