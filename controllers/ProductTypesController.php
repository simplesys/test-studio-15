<?php

namespace app\controllers;

use Yii;
use app\models\db\ProductTypes;
use app\models\db\search\ProductTypesSearch;
use app\components\yii\web\AppController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Class ProductTypesController
 * ProductTypesController implements the CRUD actions for ProductTypes model.
 *
 * @package   app\controllers
 * @author    Chuvashin Viacheslav <chuvashin.v@gmail.com>
 * @copyright 2017 Chuvashin Viacheslav
 * @created   14.09.2017 19:39
 */
class ProductTypesController extends AppController
{
    /**
     * Behaviors
     *
     * @return array
     */
    public function behaviors(): array
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProductTypes models.
     *
     * @return string
     */
    public function actionIndex(): string
    {
        $searchModel = new ProductTypesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render(
            'index',
            ['searchModel' => $searchModel, 'dataProvider' => $dataProvider]
        );
    }

    /**
     * Displays a single ProductTypes model.
     *
     * @param integer $id
     *
     * @return string
     */
    public function actionView($id): string
    {
        return $this->render('view', ['model' => $this->findModel($id)]);
    }

    /**
     * Creates a new ProductTypes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     *
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductTypes();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    /**
     * Updates an existing ProductTypes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing ProductTypes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     *
     * @param integer $id
     *
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductTypes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     *
     * @param integer $id
     *
     * @return ProductTypes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id): ProductTypes
    {
        if (($model = ProductTypes::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
