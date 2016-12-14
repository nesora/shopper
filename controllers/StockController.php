<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Stock;
use app\models\Backendusers;
use Yii;

class StockController extends Controller {

//    public function actionAjax() {
//
//        if (Yii::$app->request->isAjax && Yii::$app->request->post()) {
//
//            $data = Yii::$app->request->post();
//
//            Yii::$app->session->set('postIDs', $data);
//        }
//    }

    public function actionShop() {

//        if (!Yii::$app->session->isActive) {
        Yii::$app->session->open();
        $session = Yii::$app->session;


        $query = Stock::find();
        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);
        $stock = $query->orderBy('id')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        if (Yii::$app->request->post()) {

            $data = Yii::$app->request->post();

            $session = Yii::$app->session;


            $session['lastIDs'] = $data;


//            $savedIDs = $session['lastIDs'];
//            $savedIDs[] = $data;
//            $session['lastIDs'] = $savedIDs;
//            $savedIDs = $session['savedIDs'];
//            $savedIDs[] = $data;
//            $session['savedIDs'] = $savedIDs;
//            $session->set('postIDs', $data);
//            $savedIDs = $session['postIDs'];
//            $session->set('newIDs', $savedIDs);  // set  a session variable 
//            $session['lastIDs'] = array_merge(Yii::$app->session['newIDs'], $session['postIDs']); //merge the session variable array`s
//            unset($session['newIDs']);
//            unset($session['postIDs']);


            var_dump('savedIDs var ');
            var_dump($session['lastIDs']);


//            var_dump('start of saved IDs in lastIDs');
//            var_dump($session['lastIDs']);
//            var_dump('end of saved IDs in lastIDs');
            
        }

//        }
//        var_dump($session->isActive);
//        die;
        return $this->render('shop', [
                    'stock' => $stock,
                    'pagination' => $pagination,
        ]);
    }

    public function actionCart() {

        return $this->render('cart');
    }

    public function actionCheckout() {

//        $model = new Orders(); // insert information for cart and checkout "tabel"


        $id = Yii::$app->user->id;
        $model = Backendusers::findOne($id);

        return $this->render('checkout', ['model' => $model]);
    }

}
