<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DiplomadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Diplomados';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diplomado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Diplomado', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dip_codigo',
            'dip_nombre',
            'dip_descripcion',
            'dip_objetivo_general',
            'dip_objetivos_especificos',
            //'dip_orientado',
            //'dip_horario',
            //'dip_contacto',
            //'sec_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
