<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaFormacion */

$this->title = $model->com_for_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Competencia Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencia-formacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->com_for_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->com_for_codigo], [
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
            'com_for_codigo',
            'cg_codigo',
            'for_codigo',
        ],
    ]) ?>

</div>
