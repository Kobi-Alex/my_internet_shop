<?php
    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\UploadedFile;
    use yii\data\ActiveDataProvider;
    use yii\filters\AccessControl;
    use backend\models\User;
    use backend\models\UserForm;

class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['admin'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['owner'],
                    ],
                ]
            ]
        ];
    }
    
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
}