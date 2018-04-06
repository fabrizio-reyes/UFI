<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstadoLineaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estado Lineas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-linea-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estado Linea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'est_lin_codigo',
            'est_lin_nombre',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
