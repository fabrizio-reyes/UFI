<?php

namespace app\controllers;

use Yii;
use app\models\Seccion;
use app\models\SeccionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\widgets\ActiveForm;
use app\base\Model;

use app\modules\yii2extensions\models\CatalogOption;
use app\modules\yii2extensions\models\Image;
use app\modules\yii2extensions\models\OptionValue;
use app\modules\yii2extensions\models\query\CatalogOptionQuery;

/**
 * SeccionController implements the CRUD actions for Seccion model.
 */
class SeccionController extends Controller
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
     * Lists all Seccion models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeccionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Seccion model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
		
		return $this->render('view', [
            'model' => $model,
            'optionValues' => $optionValues,
        ]);
    }

    /**
     * Creates a new Seccion model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Seccion();

       
		
		 $modelCatalogOption = new CatalogOption;
        $modelsOptionValue = [new OptionValue];
        if ($modelCatalogOption->load(Yii::$app->request->post())) {

            $modelsOptionValue = Model::createMultiple(OptionValue::classname());
            Model::loadMultiple($modelsOptionValue, Yii::$app->request->post());
            foreach ($modelsOptionValue as $index => $modelOptionValue) {
                $modelOptionValue->sort_order = $index;
                $modelOptionValue->img = \yii\web\UploadedFile::getInstance($modelOptionValue, "[{$index}]img");
            }

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($modelsOptionValue),
                    ActiveForm::validate($modelCatalogOption)
                );
            }

            // validate all models
            $valid = $modelCatalogOption->validate();
            $valid = Model::validateMultiple($modelsOptionValue) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $modelCatalogOption->save(false)) {
                        foreach ($modelsOptionValue as $modelOptionValue) {
                            $modelOptionValue->catalog_option_id = $modelCatalogOption->id;

                            if (($flag = $modelOptionValue->save(false)) === false) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $modelCatalogOption->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }

        return $this->render('create', [
            'modelCatalogOption' => $modelCatalogOption,
            'modelsOptionValue' => (empty($modelsOptionValue)) ? [new OptionValue] : $modelsOptionValue
        ]);
		
		 return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Seccion model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            //return $this->redirect(['view', 'id' => $model->sec_codigo]);
			Yii::$app->getSession()->setFlash('success', [
			'type' => 'success',
			'duration' => 5000,
			'icon' => 'fa fa-users',  
			'title' => 'Listo ',
			'message' => 'Se guardaron los cambios.',
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
				'message' => 'No se guardaron los cambios',
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
     * Deletes an existing Seccion model.
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
     * Finds the Seccion model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Seccion the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Seccion::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
