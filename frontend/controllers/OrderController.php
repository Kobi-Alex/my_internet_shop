<?php
    namespace frontend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\UploadedFile;
    use yii\data\ActiveDataProvider;
    use yii\filters\AccessControl;
    use common\models\Category;
    use common\models\Tovar;
    use common\models\Order;
    use common\models\ItemOrder;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        $order = Order::findOne(['user_id' => $user_id, 'status' => 'new']);
        if ($order) {
            $itemOrders = ItemOrder::find()->where(['order_id' => $order->id])->all();
            return $this->render('index', ['itemOrders' => $itemOrders]);
        } else{
            return $this->render('index', ['itemOrders' => null ]);
        }
    }

    public function actionDeleteArticle() 
    {
        if ($_POST['id'] != '') {
            $itemOrder = ItemOrder::findOne(['id' => $_POST['id']]);
            $currentTovar = Tovar::findOne(['id' => $itemOrder->tovar_id]);
            $currentTovar->count = $currentTovar->count + $itemOrder->count;
            $currentTovar->save();
            $itemOrder->delete();
            return true;
        }
        return false;
    }
    
    public function actionPayment()
    {
        if ($_POST['order_id']!='') {
            $currentOrder = Order::findOne(['id' => $_POST['order_id']]);
            $currentOrder->status = 'booked';
            $currentOrder->save();
            return true;
        }
        return false;
    }
}