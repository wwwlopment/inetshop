<?php

namespace backend\controllers;

use Yii;
use common\models\KartikTreeMenu;
use common\models\KartikTreeMenuSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KartikTreeMenuController implements the CRUD actions for KartikTreeMenu model.
 */
class TreeController extends Controller
{
  /**
   * @inheritdoc
   */
  public function behaviors()
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
   * Lists all KartikTreeMenu models.
   * @return mixed
   */
  public function actionIndex()
  {
    $searchModel = new KartikTreeMenuSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('index', [
      'searchModel' => $searchModel,
      'dataProvider' => $dataProvider,
    ]);
  }

  /**
   * Displays a single KartikTreeMenu model.
   * @param string $id
   * @return mixed
   */
  public function actionView($id)
  {
    return $this->render('view', [
      'model' => $this->findModel($id),
    ]);
  }

  /**
   * Creates a new KartikTreeMenu model.
   * If creation is successful, the browser will be redirected to the 'view' page.
   * @return mixed
   */
  public function actionCreate()
  {
    $model = new KartikTreeMenu();
//        var_dump($model);
    $model->makeRoot();
    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect('/');
    } else {
      return $this->render('create', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Updates an existing KartikTreeMenu model.
   * If update is successful, the browser will be redirected to the 'view' page.
   * @param string $id
   * @return mixed
   */
  public function actionUpdate($id)
  {
    $model = $this->findModel($id);

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['view', 'id' => $model->id]);
    } else {
      return $this->render('update', [
        'model' => $model,
      ]);
    }
  }

  /**
   * Deletes an existing KartikTreeMenu model.
   * If deletion is successful, the browser will be redirected to the 'index' page.
   * @param string $id
   * @return mixed
   */
  public function actionDelete($id)
  {
    $this->findModel($id)->delete();

    return $this->redirect(['index']);
  }

  /**
   * Finds the KartikTreeMenu model based on its primary key value.
   * If the model is not found, a 404 HTTP exception will be thrown.
   * @param string $id
   * @return KartikTreeMenu the loaded model
   * @throws NotFoundHttpException if the model cannot be found
   */
  protected function findModel($id)
  {
    if (($model = KartikTreeMenu::findOne($id)) !== null) {
      return $model;
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }
}