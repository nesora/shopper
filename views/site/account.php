<?php
$this->title = 'Account';
?>
<div class="Registration">
    <div class="Registration-head">
        <h2><span></span>Update Account</h2>    
    </div>
    <form method="post">
        <input type="email" name="email"  placeholder="Write your Email Address" value="<?= $model->email ?>" required="" >
        <input type="text" name="firstname"  placeholder="Write your First Name" value="<?= $model->firstname ?>" required="" >
        <input type="text" name="lastname" placeholder="Write your Last Name" value="<?= $model->lastname ?>" required=""  >
        <input type="password" name="password" placeholder="Write your Password" value="<?= $model->password ?>" required="" >
        <input type="text" name="country" placeholder="Write your Country" value="<?= $model->country ?>" required=""  >
        <input type="text" name="city"  placeholder="Write your City" value="<?= $model->city ?>" required="" >
        <input type="text" name="address" placeholder="Write your Address" value="<?= $model->address ?>" required=""  >
        <div class="submit registration-button">
            <button type="submit" class="btn btn-success"> Update Account </button>
            <input type="hidden" value="" name="_csrf">
        </div>
    </form>
</div>

