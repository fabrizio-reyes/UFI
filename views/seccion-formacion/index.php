<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SeccionFormacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seccion Formacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-formacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Seccion Formacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'sec_for_codigo',
			'sec_for_numero',
            'sec_for_horario',
            'sec_for_docente',
            'sec_for_lugar',
            'for_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
