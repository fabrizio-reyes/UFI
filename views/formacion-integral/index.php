<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormacionIntegralSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Formacion Integrals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacion-integral-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Formacion Integral', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'for_codigo',
            'for_nombre',
            'for_descripcion',
            'for_carreras',
            'for_codigo_asignatura',
            //'sec_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
