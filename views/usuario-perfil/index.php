<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioPerfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Perfils';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-perfil-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Perfil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usu_per_codigo',
            'id',
            'per_codigo',
            'est_codigo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
