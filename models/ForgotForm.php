<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Backendusers;

/**
 * Forgot password form
 */
class ForgotForm extends Model {

    public $email;
    protected $user = false;
    public $module;
    public $token;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            ["email", "required"],
            ["email", "email"],
            ["email", "filter", "filter" => "trim"],
        ];
    }

    public function attributeLabels() {
        return [
            'email' => 'Email Address',
        ];
    }

    // make hash code with message and send email to the email user which password have been forgotten
    public function SendEmail() {

        $token = substr(base64_encode(sha1(mt_rand())), 0, 64);

        $model = Backendusers::find()->where(['email' => $this->email])->one();

        $model->setAttributes(['token' => $token, 'expiredate' => time() + 86400]);




        if ($model->save()) {
            $mail = Yii::$app->mailer->compose('redirect', ['model' => $model])
                    ->setFrom('rosensoul@gmail.com')
                    ->setTo($model->email);
            //use var_dump to get the link ,because the text dont go to gmail,because google think this is SPAM !!!
            var_dump($mail);
            die;
        }
    }

}
