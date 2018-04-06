<?php

namespace app\controllers;

use Yii;
use app\models\Linea;
use app\models\Taller;
use app\models\LineaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;



/**
 * LineaController implements the CRUD actions for Linea model.
 */
class LineaController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Linea models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LineaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Linea model.
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
     * Creates a new Linea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Linea();
		$talleres = [new Taller];
		
        if ($model->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->lin_codigo]);
			$talleres = Model::createMultiple(Taller::classname(),$talleres,'tal_codigo');
            Model::loadMultiple($talleres, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($talleres) && $valid;

            if ($valid) {
				$tal='Linea creada';
                    if ($model->save()) {
                        foreach ($talleres as $taller) {
							/* $taller=new Taller();
							$taller->tal_nombre = $taller->tal_nombre;
							$taller->tal_sede = $taller->tal_sede;
							$taller->tal_fecha = $taller->tal_fecha;
							$taller->tal_docente = $taller->tal_docente;
							$taller->tal_objetivos = $taller->tal_objetivos;*/
                            $taller->lin_codigo = $model->lin_codigo; 
                            $taller->save();
							$tal='Linea y Talleres creados correctamente';
						   
                        }
						Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 5000,
						'icon' => 'fa fa-users',  
						'title' => 'Realizado',
						'message' => $tal,
						'positonY' => 'bottom',
						'positonX' => 'right'
						]);					
						return $this->goHome();
                    }			        
            }else{
				Yii::$app->getSession()->setFlash('danger', [
				'type' => 'danger',
				'duration' => 5000,
				'icon' => 'fa fa-users',  
				'title' => 'Ocurrió un problema en validate ',
				'message' => 'No se pudo crear la Linea',
				'positonY' => 'bottom',
				'positonX' => 'right'
				]);
				return $this->goHome();
			}  
        }else{
				Yii::$app->getSession()->setFlash('danger', [
				'type' => 'danger',
				'duration' => 5000,
				'icon' => 'fa fa-users',  
				'title' => 'Ocurrió un problema ',
				'message' => 'No se pudo crear la Linea',
				'positonY' => 'bottom',
				'positonX' => 'right'
				]);
				return $this->goHome();
			}

        return $this->render('create', [
            'model' => $model,
			'talleres' => (empty($talleres)) ? [new Taller] : $talleres
        ]);
    }

    /**
     * Updates an existing Linea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->lin_codigo]);
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
     * Deletes an existing Linea model.
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
     * Finds the Linea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Linea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Linea::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
