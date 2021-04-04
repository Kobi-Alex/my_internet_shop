<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use backend\models\Category;
use backend\models\CategoryForm;


class CategoryController extends Controller 
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
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['owner'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'create', 'update', 'delete'],
                        'roles' => ['manager'],
                    ],
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Category::find()
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
    
    public function actionCreate()
    {
        $model = new CategoryForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $category = new Category;
            $category->name = $model->name;
            $category->description = $model->description;

            if($category->save()) {
                Yii::$app->session->setFlash('success', 'Товар збережено в DB');
            } else {
                Yii::$app->session->setFlash('error', 'Помилка збереження товару в DB');
            }
            return $this->redirect(['category/index']);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionView($id)
    {
        $category = Category::findOne(['id' => $id]);
        return $this->render('view', ['category' => $category]);
    }

    public function actionUpdate($id)
    {
        $model = new CategoryForm;
        $category = Category::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $category->name = $model->name;
            $category->description = $model->description;

            if($category->save()) {
                Yii::$app->session->setFlash('success', 'Товар збережено в DB');
            } else {
                Yii::$app->session->setFlash('error', 'Помилка збереження товару в DB');
            }
            return $this->redirect(['category/index']);
        }

        $model->name = $category->name;
        $model->description = $category->description;

        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $category = Category::findOne(['id' => $id]);

        if ($category->delete()) {
            Yii::$app->session->setFlash('success', 'Товар видалено з DB');
        }  else {
            Yii::$app->session->setFlash('error', 'Помилка видалення товару з DB');
        }
        return $this->redirect(['category/index']);
    }
}