<?php

namespace app\controllers;

use app\models\Backendusers;
use app\models\Orders;
use app\models\Stock;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\Pagination;
use yii\db\Expression;
use yii\web\Controller;

class StockController extends Controller {
    
    public function behaviors()
{
    return [
        [
            'class' => TimestampBehavior::className(),
            'createdAtAttribute' => 'timestamp',
            'value' => new Expression('NOW()'),
        ],
    ];
}

    public function actionAjax() {

        if (Yii::$app->request->isAjax && Yii::$app->request->isPost) {
            Yii::$app->session->open();
            $session = Yii::$app->session;
            if (!isset($session['selectedItems'])) {
                $session['selectedItems'] = [];
            }

            $allItemsIDs = $session['selectedItems'];
            $itemID = Yii::$app->request->post("id");
            $allItemsIDs[] = $itemID;
            $session['selectedItems'] = array_unique($allItemsIDs);

            return "OK";
        }
    }

    public function actionShop() {

        $query = Stock::find();
        $pagination = new Pagination([
            'defaultPageSize' => 6,
            'totalCount' => $query->count(),
        ]);
        $stock = $query->orderBy('id')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('shop', [
                    'stock' => $stock,
                    'pagination' => $pagination,
        ]);
    }

    public function actionCart() {

        Yii::$app->session->open();

        $selectedItems = Yii::$app->session['selectedItems'];

        $stockItems = Stock::find()->where(['id' => $selectedItems])->all();

        $data = ['selectedItems' => $stockItems,];

        $id = Yii::$app->user->id;

        $model = Backendusers::findOne($id);

        $data['model'] = $model;

        $request = Yii::$app->request;

        if ($request->isPost) {

            $quantity = $request->post('quantity', array());

            foreach ($data['selectedItems'] as $item) {

                foreach ($quantity as $key => $q) {

                    if ($item->id == $key) {

                        $orders = new Orders();

                        $orders->setAttributes([
                            'firstname' => $model->firstname,
                            'lastname' => $model->lastname,
                            'country' => $model->country,
                            'city' => $model->city,
                            'address' => $model->address,
                            'stockname' => $item->stockname,
                            'quantity' => $q['quantity'],
                            'price' => $q['subtotal'],
                            'timestamp' => time(),
                        ]);
                        $orders->save();
                    }
                }
            }
            unset(Yii::$app->session['selectedItems']);
            return $this->redirect('shop');
        }
        return $this->render('cart', $data);
    }

}
