<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSeccionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Seccions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-seccion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Seccion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usu_sec_codigo',
            'id',
            'sec_codigo',
            'usu_sec_fecha',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
