<?php

namespace app\controllers;

use Yii;
use app\models\Personal;
use app\models\Archivo;
use app\models\UploadForm;
use app\models\PersonalSearch;
use yii\web\Controller;
use yii\web\A;
use yii\web\UploadedFile;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PersonalController implements the CRUD actions for Personal model.
 */
class PersonalController extends Controller
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
     * Lists all Personal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PersonalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Personal model.
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
     * Creates a new Personal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Personal();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->pers_codigo]);
			Yii::$app->getSession()->setFlash('success', [
			'type' => 'success',
			'duration' => 5000,
			'icon' => 'fa fa-users',  
			'title' => 'Realizado',
			'message' => 'Contacto creado',
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
				'message' => 'No se pudo crear el contacto',
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
     * Updates an existing Personal model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->pers_codigo]);
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
	
	public function actionUpdatefile($id){
        $archivo = Archivo::find()->where('arc_codigo='.$id)->one();
        $file = new UploadForm();

        if ($archivo->load(Yii::$app->request->post())) {
            //return $this->redirect(['view', 'id' => $model->pers_codigo]);
			$file->imageFile = UploadedFile::getInstance($file, 'imageFile');
             $folder='archivos/personal/';
			//$model->per_fotografia=$file->imageFile->getBaseName();
			 
			 
			$stepImg=$file->imageFile->name;
			while (file_exists($folder.$stepImg)) {
			 
				$path_parts = pathinfo($stepImg);
				 
				$nom=$path_parts['filename'];
				$ext=$path_parts['extension'];
				$stepImg=$nom.'(1).'.$ext;
			}
			$file->imageFile->name=$stepImg;
			if ($file->upload($folder)) {
				if($archivo->save()){
					Yii::$app->getSession()->setFlash('success', [
					'type' => 'success',
					'duration' => 5000,
					'icon' => 'fa fa-users',  
					'title' => 'Realizado',
					'message' => 'Foto cambiada correctamente',
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

        return $this->render('updatefile', [
            'file' => $file,
			'archivo' => $archivo,
        ]);
    }

    /**
     * Deletes an existing Personal model.
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
     * Finds the Personal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Personal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Personal::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
