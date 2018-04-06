<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enlaces';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Enlace', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'enl_codigo',
            'enl_nombre',
            'enl_direccion',
            'sec_codigo',
            'arc_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
