<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use backend\models\Discount;
use backend\models\DiscountForm;

class DiscountController extends Controller 
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
                    ]
                ]
            ]
        ];
    }
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Discount::find()
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionCreate()
    {
        $model = new DiscountForm;
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $discount = new Discount;
            $discount->name = $model->name;
            $discount->description = $model->description;
            $discount->discount = $model->discount;

            if($discount->save()) {
                Yii::$app->session->setFlash('success', 'Знижку збережено в DB');
            } else {
                Yii::$app->session->setFlash('error', 'Помилка збереження знижки в DB');
            }
            return $this->redirect(['discount/index']);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionView($id)
    {
        $discount = Discount::findOne(['id' => $id]);
        return $this->render('view',['discount' => $discount]);
    }

    public function actionUpdate($id)
    {
        $model = new DiscountForm;
        $discount = Discount::findOne(['id' => $id]);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $discount->name = $model->name;
            $discount->description = $model->description;
            $discount->discount = $model->discount;

            if($discount->save()) {
                Yii::$app->session->setFlash('success', 'Товар збережено в DB');
            } else {
                Yii::$app->session->setFlash('error', 'Помилка збереження товару в DB');
            }
            return $this->redirect(['discount/index']);
        }

        $model->name = $discount->name;
        $model->description = $discount->description;
        $model->discount = $discount->discount;

        return $this->render('create', ['model' => $model]);
    }

    public function actionDelete($id) 
    {
        $discount = Discount::findOne(['id' => $id]);

        if ($discount->delete()) {
            Yii::$app->session->setFlash('success', 'Знижку видалено з DB');
        }  else {
            Yii::$app->session->setFlash('error', 'Помилка видалення знижки з DB');
        }
        return $this->redirect(['discount/index']);
    }
}