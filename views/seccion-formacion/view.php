<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SeccionFormacion */

$this->title = $model->sec_for_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Seccion Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-formacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->sec_for_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->sec_for_codigo], [
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
            'sec_for_codigo',
			'sec_for_numero',
            'sec_for_horario',
            'sec_for_docente',
            'sec_for_lugar',
            'for_codigo',
        ],
    ]) ?>

</div>
