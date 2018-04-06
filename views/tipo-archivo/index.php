<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TipoArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tipo Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-archivo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tipo Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tip_arc_codigo',
            'tip_arc_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
