<?php

    namespace backend\controllers;

    use Yii;
    use yii\web\Controller;
    use yii\web\UploadedFile;
    use yii\data\ActiveDataProvider;
    use yii\filters\AccessControl;
    use backend\models\PromotionForm;
    use backend\models\Promotion;

    class PromotionController extends Controller
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
                            'actions' => ['index'],
                            'roles' => ['manager'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['index', 'create', 'update', 'delete'],
                            'roles' => ['promotionManager'],
                        ]
                    ]
                ]
            ];
        }
        public function actionIndex()
        {
            $dataProvider = new ActiveDataProvider([
                'query' => Promotion::find(),
            ]);
            return $this->render('index', ['dataProvider' => $dataProvider]);
        }

        public function actionCreate()
        {
            $model = new PromotionForm;
            if ($model->load(Yii::$app->request->post())) {
                $model->imageFile = UploadedFile::getInstances($model, 'imageFile');
                if ($imagePath = $model->upload()) {
                    $promotion = new Promotion;
                    $promotion->name = $model->name;
                    $promotion->description = $model->description;
                    $promotion->url_image = json_encode($imagePath);
        
                    if($promotion->save()) {
                        Yii::$app->session->setFlash('success', 'Рекламу збережено в DB');
                    }  else {
                        Yii::$app->session->setFlash('error', 'Помилка збереження реклами в DB');
                    }
                    return $this->redirect(['promotion/index']);
                }
            }

            return $this->render('create', [
                'model' => $model,
                'initialPreview' => [],
                'initialConfig' => [],
                'promotion_id' => ''
            ]);
        }

        public function actionView($id)
        {
            $promotion = Promotion::findOne(['id' => $id]);
            $images = json_decode($promotion->url_image, true);
            return $this->render('view', ['promotion' => $promotion, 'images' => $images]);
        }

        public function actionUpdate($id)
        {
            $model = new PromotionForm;
            $promotion = Promotion::findOne(['id' => $id]);

            if ($model->load(Yii::$app->request->post())) {
                $model->imageFile = UploadedFile::getInstances($model, 'imageFile');
                $imagePath = $model->upload();
                if ($imagePath !== false) {
                    $promotion->name = $model->name;
                    $promotion->description = $model->description;
                   
                    if ($imagePath) {
                        $image = json_decode($promotion->url_image, true);
                        $imagePath = array_merge($image, $imagePath);
                        $promotion->url_image = json_encode($imagePath);
                    }
        
                    if($promotion->save()) {
                        Yii::$app->session->setFlash('success', 'Рекламу оновлено в DB');
                    }  else {
                        Yii::$app->session->setFlash('error', 'Помилка оновлення реклами в DB');
                    }
                    return $this->redirect(['promotion/index']);
                }
            }

            $model->name = $promotion->name;
            $model->description = $promotion->description;
            
            $images = json_decode($promotion->url_image, true);
            $initialPreview = [];
            $initialConfig = [];

            foreach ($images as $image) {
                $initialPreview[] = '../../' . $image;
                $initialConfig[] = [
                    'key' => $image,
                ];
            }

            return $this->render('create', [
                'model' => $model,
                'initialPreview' => $initialPreview,
                'promotion_id' => $promotion->id,
                'initialConfig' => $initialConfig
            ]);
        }

        public function actionFileDeletePromotion($id)
        {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            if (isset($_POST['key'])) {
                $image = $_POST['key'];
                unlink($_POST['key']);
                $promotion = Promotion::findOne(['id' => $id]);
                $images = json_decode($promotion->url_image, true);

                $result = [];
                foreach ($images as $value) {
                    if ($image != $value) {
                        $result[] = $value;
                    }
                }
                $promotion->url_image = json_encode($result);
                $promotion->save();
            }
            return true;
        }

        public function actionDelete($id)
        {
            $promotion = Promotion::findOne(['id' => $id]);
            $images = json_decode($promotion->url_image, true);

            foreach ($images as $image) {
                unlink($image);
            }
            if ($promotion->delete()) {
                Yii::$app->session->setFlash('success', 'Рекламу видалено в DB');
            }  else {
                Yii::$app->session->setFlash('error', 'Помилка видалення реклами з DB');
            }
            return $this->redirect(['promotion/index']);
        }
    }