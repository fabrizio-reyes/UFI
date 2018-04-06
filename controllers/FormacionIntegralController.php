<?php

namespace app\controllers;

use Yii;
use app\models\FormacionIntegral;
use app\models\SeccionFormacion;
use app\models\FormacionIntegralSearch;
use app\models\CompetenciaFormacion;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\base\Model;


/**
 * FormacionIntegralController implements the CRUD actions for FormacionIntegral model.
 */
class FormacionIntegralController extends Controller
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
     * Lists all FormacionIntegral models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FormacionIntegralSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single FormacionIntegral model.
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
     * Creates a new FormacionIntegral model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new FormacionIntegral();
		$seccionesformacion = [new SeccionFormacion];

        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->post('competencias')) {
			$competencias=Yii::$app->request->post('competencias');
			if($model->validate()){
				if($model->save()){
					Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 5000,
					'icon' => 'fa fa-users',  
					'title' => 'Realizado',
					'message' => 'Formación Integral creada',
					'positonY' => 'bottom',
					'positonX' => 'right'
					]);
					if(sizeof($competencias)>0){
						for($i=0;$i<sizeof($competencias);$i++){
							$competenciaFormacion=new CompetenciaFormacion();
							$competenciaFormacion->cg_codigo=$competencias[$i];
							$competenciaFormacion->for_codigo=$model->for_codigo;
							$competenciaFormacion->save();
						}
						return $this->goHome();
					}else{
						Yii::$app->getSession()->setFlash('danger', [
						'type' => 'danger',
						'duration' => 5000,
						'icon' => 'fa fa-users',  
						'title' => 'Ocurrió un problema ',
						'message' => 'No se pudo crear la Formación Integral',
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
						'message' => 'Datos no validos',
						'positonY' => 'bottom',
						'positonX' => 'right'
						]);
						return $this->goHome();
				}
				//return $this->redirect(['view', 'id' => $model->for_codigo]);
				$seccionesformacion = Model::createMultiple(SeccionFormacion::classname(),$seccionesformacion,'sec_for_codigo');
				Model::loadMultiple($seccionesformacion, Yii::$app->request->post());

				// validate all models
				$valid = $model->validate();
				$valid = Model::validateMultiple($seccionesformacion) && $valid;

				if ($valid) {
					
                    if ($model->save()) {
                        foreach ($seccionesformacion as $seccionformacion) {
							
                            $seccionformacion->for_codigo = $model->for_codigo; 
                            $seccionformacion->save();								   
                        }
						Yii::$app->getSession()->setFlash('success', [
						'type' => 'success',
						'duration' => 5000,
						'icon' => 'fa fa-users',  
						'title' => 'Realizado',
						'message' => 'Formación Integral creada',
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
				'message' => 'No se pudieron guardar los cambios',
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
				'message' => 'No se pudieron guardar los cambios',
				'positonY' => 'bottom',
				'positonX' => 'right'
				]);
				return $this->goHome();
			}
		}
        return $this->render('create', [
            'model' => $model,
			'seccionesformacion' => (empty($seccionesformacion)) ? [new SeccionFormacion] : $seccionesformacion
        ]);
	}

    /**
     * Updates an existing FormacionIntegral model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
		$codigoCompAnt=[];
        $model = $this->findModel($id);
		$competenciaFormacionAnt=CompetenciaFormacion::find()->where('for_codigo='.$model->for_codigo)->all();
		for($i=0;$i<sizeof($competenciaFormacionAnt);$i++){
				$codigoCompAnt[]=$competenciaFormacionAnt[$i]->cg_codigo;
			}
        if ($model->load(Yii::$app->request->post())  && $model->save()) {
			if(Yii::$app->request->post('competencias')){
				Yii::$app->getSession()->setFlash('success', [
				'type' => 'success',
				'duration' => 5000,
				'icon' => 'fa fa-users',  
				'title' => 'Realizado',
				'message' => 'Cambios guardados correctamente',
				'positonY' => 'bottom',
				'positonX' => 'right'
				]);
				$competenciasNuevas=Yii::$app->request->post('competencias');
				foreach($competenciaFormacionAnt as $a=>$competenciaAnt){
					if (!in_array($competenciaAnt->cg_codigo, $competenciasNuevas)) {
						$competenciaAnt->delete();
					}
				}
				for($i=0;$i<sizeof($competenciasNuevas);$i++){
					if (!in_array($competenciasNuevas[$i], $codigoCompAnt)) {
						$competenciaFormacion=new CompetenciaFormacion();
						$competenciaFormacion->cg_codigo=$competenciasNuevas[$i];
						$competenciaFormacion->for_codigo=$model->for_codigo;
						$competenciaFormacion->save();
					}
				}
				//return $this->redirect(['view', 'id' => $model->for_codigo]);
				return $this->goHome();
			}else{
				Yii::$app->getSession()->setFlash('danger', [
				'type' => 'danger',
				'duration' => 5000,
				'icon' => 'fa fa-users',  
				'title' => 'Ocurrió un problema ',
				'message' => 'Debes seleccionar almenos una Competencia',
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
     * Deletes an existing FormacionIntegral model.
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
     * Finds the FormacionIntegral model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return FormacionIntegral the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = FormacionIntegral::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
