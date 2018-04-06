<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DiplomadoArchivo */

$this->title = $model->dip_arc_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Diplomado Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diplomado-archivo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dip_arc_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dip_arc_codigo], [
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
            'dip_arc_codigo',
            'dip_codigo',
            'arc_codigo',
            'tip_arc_codigo',
        ],
    ]) ?>

</div>
