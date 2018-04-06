<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Enlace */

$this->title = $model->enl_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Enlaces', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enlace-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->enl_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->enl_codigo], [
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
            'enl_codigo',
            'enl_nombre',
            'enl_direccion',
            'sec_codigo',
            'arc_codigo',
        ],
    ]) ?>

</div>
