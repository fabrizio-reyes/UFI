<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LineaArchivoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Linea Archivos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linea-archivo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Linea Archivo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lin_arc_codigo',
            'lin_codigo',
            'arc_codigo',
            'tip_arc_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
