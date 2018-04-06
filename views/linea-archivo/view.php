<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LineaArchivo */

$this->title = $model->lin_arc_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Linea Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linea-archivo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->lin_arc_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->lin_arc_codigo], [
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
            'lin_arc_codigo',
            'lin_codigo',
            'arc_codigo',
            'tip_arc_codigo',
        ],
    ]) ?>

</div>
