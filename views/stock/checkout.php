<?php
$this->title = 'Checkout';

use yii\helpers\Html;
?>
<div class="jumbotron">
    <div class="container text-center">
        <div class="checkout-form">
            <div class="form-fields">
                <div class="summary">
                    <h3> Summary </h3>
                    <table  class="table table-striped" >
                        <tr>
                            <th> Product </th> 
                            <th> Price of product </th>
                            <th></th>
                        </tr>
                        <tr>
                            <th> name of product </th> 
                            <th> 3$ </th>
                            <th> </th>
                        </tr>
                        <tr>
                            <th> Total Cost : </th> 
                            <th> 43534 $ </th>
                            <th></th>
                        </tr>
                    </table>
                </div>
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






