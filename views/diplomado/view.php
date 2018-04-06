<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Diplomado */

$this->title = $model->dip_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Diplomados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diplomado-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->dip_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->dip_codigo], [
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
            'dip_codigo',
            'dip_nombre',
            'dip_descripcion',
            'dip_objetivo_general',
            'dip_objetivos_especificos',
            'dip_orientado',
            'dip_horario',
            'dip_contacto',
            'sec_codigo',
        ],
    ]) ?>

</div>
