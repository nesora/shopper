<?php

namespace app\models;

use Yii;

class ResetForm extends \yii\base\Model {

    public $newpassword;
    public $newpasswordconfirm;
    protected $user = false;
    public $newtoken;

    public function rules() {
        return [
            [['newpassword', 'newpasswordconfirm'], 'required'],
            [['newpassword', 'newpasswordconfirm'], 'string', 'min' => 7, 'max' => 128],
            [['newpasswordconfirm'], 'compare', 'compareAttribute' => 'newpassword', 'message' => 'Passwords do not match , write them again please '],
            [['newpassword', 'newpasswordconfirm'], 'filter', 'filter' => 'trim'],
        ];
    }

    public function attributeLabels() {
        return [
            'newpassword' => 'New Password',
            'newpasswordconfirm' => 'New Password Confirm',
        ];
    }

    public function Reset($user) {
        if ($user) {
            $user->setAttributes(['token' => NULL, 'expiredate' => NULL]);
            $bufferpassword = $this->newpassword;
            if ($bufferpassword) {
                $secondhash = Yii::$app->getSecurity()->generatePasswordHash($bufferpassword);
                $user->setAttribute('password', $secondhash);
            }
            return $user->save();
        } else {
            Yii::$app->session->setFlash('error', 'Sorry ,  Try Again Later ');
        }
    }

}
