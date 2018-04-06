<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DatosUfi */

$this->title = $model->dat_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Datos Ufis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datos-ufi-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dat_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dat_codigo], [
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
            'dat_codigo',
            'dat_nombre',
            'dat_titulo',
            'dat_descripcion',
            'sec_codigo',
        ],
    ]) ?>

</div>
