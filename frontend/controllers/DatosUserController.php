<?php

namespace frontend\controllers;

use Yii;
use common\models\DatosUser;
use frontend\models\DatosUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DatosUserController implements the CRUD actions for DatosUser model.
 */
class DatosUserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    // Roles ? => Visitante , @ => Usuario logeado, superadmin=> super administrador , admin => docentes
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['index', 'update', 'view', 'delete'],
                        'allow' => true,
                        'roles' => ['administrador'],
                    ],                   
                    [
                        'actions' => ['create', 'update','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],                 
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DatosUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DatosUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single DatosUser model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DatosUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DatosUser();
        
        $model->idUser = Yii::$app->user->getId();
        
        if (\common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()])){
            return $this->redirect(['update', 'id'=>\common\models\DatosUser::findOne(['idUser'=>Yii::$app->user->getId()])->idDatos]);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['site/index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing DatosUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idDatos]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing DatosUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DatosUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DatosUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DatosUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
