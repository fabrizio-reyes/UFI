<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LineaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lineas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linea-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Linea', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'lin_codigo',
            'lin_nombre',
            'lin_descripcion',
            'est_lin_codigo',
            'cg_codigo',
            //'sec_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
