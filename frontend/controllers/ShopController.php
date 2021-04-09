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
    use common\models\LoginForm;
    use frontend\models\PasswordResetRequestForm;
    use frontend\models\ResetPasswordForm;
    use frontend\models\SignupForm;
    use frontend\models\ContactForm;
    use common\models\Category;
    use common\models\Tovar;
    use common\models\Discount;


class ShopController extends Controller
{
    public function actionIndex($id = null)
    {
        $categories = Category::find()->all();
        if ($id == null) {
            $tovars = Tovar::find()->all();
        } else {
            $tovars = Tovar::find()->where(['category_id' => $id])->all();
        } 
        return $this->render('index', ['categories' => $categories, 'tovars' => $tovars]);
    }
    
    public function actionView($id)
    {
        $tovar = Tovar::findOne(['id' => $id]);
        $images = json_decode($tovar->url_image, true);
        $discount = Discount::findOne(['id' => $tovar->discount_id]);
        return  $this->render('view', ['tovar' => $tovar, 'images' => $images, 'discount' => $discount]);
    }


        
}