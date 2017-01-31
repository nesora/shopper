<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ForgotForm;
use app\models\Backendusers;
use app\models\ResetForm;

class SiteController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout', 'register'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex() {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index');
        }

        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        return $this->redirect('index');
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');
            return $this->refresh();
        }
        return $this->render('contact', [
                    'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout() {
        return $this->render('about');
    }

    public function actionRegister() {

        $model = new Backendusers();

        $request = Yii::$app->request;

        if ($request->isPost) {
            $model->setAttributes([
                'email' => $request->post('email'),
                'firstname' => $request->post('firstname'),
                'lastname' => $request->post('lastname'),
                'country' => $request->post('country'),
                'city' => $request->post('city'),
                'address' => $request->post('address'),
            ]);

            $password = $request->post('password');
            if ($password) {
                $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
                $model->setAttribute('password', $hash);
            }
            if ($model->save()) {
                return $this->redirect(['/site/login', 'id' => $model->id]);
            }
        } else {
            return $this->render('register', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Backendusers model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionAccount() {

        $id = Yii::$app->user->id;

        $model = Backendusers::findOne($id);

        $request = Yii::$app->request;

        if ($request->isPost) {

            $form = $request->post('Backendusers');

            $model->setAttributes([
                'email' => $form['email'],
                'firstname' => $form['firstname'],
                'lastname' => $form['lastname'],
                'country' => $form['country'],
                'city' => $form['city'],
                'address' => $form['address'],
            ]);
            $password = $form['password'];
            if ($password) {
                $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
                $model->setAttribute('password', $hash);
            }
            if ($model->save()) {
                return $this->redirect(['index', 'id' => $model->id]);
            }
        } else {
            return $this->render('account', [
                        'model' => $model,
            ]);
        }
    }

    public function actionForgot() {
        $model = new ForgotForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->SendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry , we are unable to reset your password for the email u provided at the moment , please try again later');
            }
        }
        return $this->render('forgot', ['model' => $model]);
    }

    public function actionReset() {
        $model = new ResetForm();
        $token = Yii::$app->getRequest()->getQueryParam('token');
        $user = Backendusers::find()->where(['token' => $token])->one();
        if ($user == NULL || $user->expiredate < time()) {
            Yii::$app->session->setFlash('error', 'Sorry , the link for reset password is wrong , please try again ');
            return $this->redirect(Yii::$app->urlManager->createUrl(["site/forgot"]));
        }
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate() && $model->Reset($user)) {
                return $this->redirect(Yii::$app->urlManager->createUrl(["site/login"]));
            } else {
                Yii::$app->session->setFlash('error', 'Sorry , we are unable to reset your password, please try again ');
            }
        }
        return $this->render('reset', ['model' => $model]);
    }

}
