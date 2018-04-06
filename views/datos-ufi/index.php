<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DatosUfiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datos Ufis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-ufi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Datos Ufi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dat_codigo',
            'dat_nombre',
            'dat_titulo',
            'dat_descripcion',
            'sec_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
