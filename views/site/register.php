<?php
$this->title = 'Register';
?>
<div class="Registration  col-xs-4 col-md-3 col-sm-5">
    <div class="Registration-head">
        <h2><span></span>Registration</h2>
    </div>
    <form method="post">
        <input type="text" name="firstname"  placeholder="Write your First Name" value="<?= $model->firstname ?>" required="">
        <input type="text" name="lastname" placeholder="Write your Last Name" value="<?= $model->lastname ?>"required="">
        <input type="email" name="email"  placeholder="Write your Email Address" value="<?= $model->email ?>"required="">
        <input type="password" name="password" placeholder="Write your Password" value="<?= $model->password ?>" required="">
        <input type="text" name="address"placeholder="Write your Address" value="<?= $model->address ?>"required="">
        <input type="text" name="city"  placeholder="Write your City" value="<?= $model->city ?>" required="">
        <input type="text" name="country" placeholder="Write your Country" value="<?= $model->country ?>"required="">

            <div class="submit registration-button">
            <button type="submit" class="btn btn-success"> Create Account </button>
            <input type="hidden" value="" name="_csrf">
        </div>
    </form>
</div>
