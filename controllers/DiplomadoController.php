<?php

namespace app\controllers;

use Yii;
use app\models\Diplomado;
use app\models\DiplomadoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DiplomadoController implements the CRUD actions for Diplomado model.
 */
class DiplomadoController extends Controller
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
     * Lists all Diplomado models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DiplomadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Diplomado model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Diplomado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Diplomado();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->dip_codigo]);
			Yii::$app->getSession()->setFlash('success', [
			'type' => 'success',
			'duration' => 5000,
			'icon' => 'fa fa-users',  
			'title' => 'Realizado',
			'message' => 'Diplomado creado',
			'positonY' => 'bottom',
			'positonX' => 'right'
			]);					
			return $this->goHome();
        }else{
				Yii::$app->getSession()->setFlash('danger', [
				'type' => 'danger',
				'duration' => 5000,
				'icon' => 'fa fa-users',  
				'title' => 'Ocurrió un problema ',
				'message' => 'No se pudo crear el diplomado',
				'positonY' => 'bottom',
				'positonX' => 'right'
				]);
				return $this->goHome();
			}

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Diplomado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) 
    {
        $model = $this->findModel($id); 

        if ($model->load(Yii::$app->request->post()) && $model->save()) { //si un formulario hizo post y el modelo se guarda
            //return $this->redirect(['view', 'id' => $model->dip_codigo]); //redirecciona a una vista
			Yii::$app->getSession()->setFlash('success', [
			'type' => 'success',
			'duration' => 5000,
			'icon' => 'fa fa-users',  
			'title' => 'Realizado',
			'message' => 'Cambios guardados correctamente',
			'positonY' => 'bottom',
			'positonX' => 'right'
			]);
			return $this->goHome();
        }else{
				Yii::$app->getSession()->setFlash('danger', [
				'type' => 'danger',
				'duration' => 5000,
				'icon' => 'fa fa-users',  
				'title' => 'Ocurrió un problema ',
				'message' => 'No se pudieron guardar los cambios',
				'positonY' => 'bottom',
				'positonX' => 'right'
				]);
				return $this->goHome();
			}

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Diplomado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Diplomado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Diplomado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Diplomado::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
