<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaDiplomado */

$this->title = $model->com_dip_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Competencia Diplomados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencia-diplomado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->com_dip_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->com_dip_codigo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'com_dip_codigo',
            'cg_codigo',
            'dip_codigo',
        ],
    ]) ?>

</div>
