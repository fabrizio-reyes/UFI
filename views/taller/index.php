<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TallerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tallers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="taller-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Taller', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tal_codigo',
            'tal_nombre',
            'tal_sede',
            'tal_fecha',
            'tal_docente',
            //'tal_objetivos',
            //'lin_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
