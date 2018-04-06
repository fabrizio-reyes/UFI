<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Seccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sec_codigo',
            'sec_nombre',
            'sec_titulo',
            'sec_descripcion',
            'sec_orden',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
