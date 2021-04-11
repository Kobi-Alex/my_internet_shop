<?php
    namespace frontend\controllers;

    use frontend\models\ResendVerificationEmailForm;
    use frontend\models\VerifyEmailForm;
    use Yii;
    use yii\base\InvalidArgumentException;
    use yii\web\BadRequestHttpException;
    use yii\web\Controller;
    use yii\filters\VerbFilter;
    use yii\filters\AccessControl;
    use frontend\models\PasswordResetRequestForm;
    use frontend\models\ResetPasswordForm;
    use frontend\models\SignupForm;
    use frontend\models\ContactForm;
    use frontend\models\OrderForm;
    use common\models\LoginForm;
    use common\models\Category;
    use common\models\Tovar;
    use common\models\Discount;
    use common\models\Promotion;
    use common\models\Order;
    use common\models\ItemOrder;

class ShopController extends Controller
{
    public function actionIndex($id = null)
    {
        $categories = Category::find()->all();
        $promotions = Promotion::find()->all();
        
        if ($id == null) {
            $tovars = Tovar::find()->andWhere(['>', 'count', 0])->all();
        } else {
            $tovars = Tovar::find()->where(['category_id' => $id])->andWhere(['>', 'count', 0])->all();
        } 
        return $this->render('index', ['categories' => $categories, 'tovars' => $tovars, 'promotions' => $promotions]);
    }
    
    public function actionView($id)
    {
        $tovar = Tovar::findOne(['id' => $id]);
        $images = json_decode($tovar->url_image, true);
        $discount = Discount::findOne(['id' => $tovar->discount_id]);
        return  $this->render('view', ['tovar' => $tovar, 'images' => $images, 'discount' => $discount]);
    }
    
    public function actionAddOrder()
    {
        $order_id = null;
        $user_id = Yii::$app->user->id;
        $order = Order::findOne(['user_id' => $user_id]);
        if ($_POST['tovar_id']!= '' && $_POST['tovar_count']!= '') {
            if ($order && $order->status == 'new') {
                $order_id = $order->id;
            } else {
                $new_order = new Order;
                $new_order->number = "AB-123456";
                $new_order->user_id = $user_id;
                $new_order->status = 'new';
                $new_order->save();
                $order_id = $new_order->id;
            }

            $itemOrder = new ItemOrder;
            $itemOrder->count = $_POST['tovar_count'];
            $itemOrder->tovar_id = $_POST['tovar_id'];
            $itemOrder->order_id = $order_id;
            $itemOrder->save();

            $currentTovar = Tovar::findOne(['id' => $_POST['tovar_id']]);
            $currentTovar->count = $currentTovar->count - $_POST['tovar_count'];
            $currentTovar->save();

            return true;
        }
        return false;
    }
}