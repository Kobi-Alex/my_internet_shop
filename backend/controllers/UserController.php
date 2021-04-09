<?php
    namespace backend\controllers;

    use Yii;
    use common\models\User;
    use yii\web\Controller;
    use yii\web\UploadedFile;
    use yii\data\ActiveDataProvider;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;

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
        $role = Yii::$app->AuthManager->Roles;
        $role_array = [];
        foreach ($role as $key => $value) {
            $role_array[$key] = $key;
        }
        $users = User::find()->all();
        foreach ($users as $user) {
            $role = array_keys(Yii::$app->AuthManager->getRolesByUser($user->id))[0];
            $user_array[] = [
                'id' => $user->id,
                'username' => $user->username,
                'email' => $user->email,
                'role' => $role,
            ];

        }
        return $this->render('index', [
            'users' => $user_array,
            'role_array' => $role_array
        ]);
    }
    
    public function actionChangeRole() 
    {
        if ($_POST['id'] != '' && $_POST['role'] != '') {
            $auth = Yii::$app->authManager;
            Yii::$app->AuthManager->revokeAll($_POST['id']);
            $role_new = $auth->getRole($_POST['role']);
            $auth->assign($role_new, $_POST['id']);
            return true;
        }
        return false;
    }

    public function actionDeleteUser() 
    {
        if ($_POST['id'] != '') {
            $user = User::findOne(['id' => $_POST['id']]);
            $user->delete();
            return true;
        }
        return false;
    }
}