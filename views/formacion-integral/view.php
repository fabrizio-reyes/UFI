<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FormacionIntegral */

$this->title = $model->for_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Formacion Integrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="formacion-integral-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->for_codigo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->for_codigo], [
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
            'for_codigo',
            'for_nombre',
            'for_descripcion',
            'for_carreras',
            'for_codigo_asignatura',
            'sec_codigo',
        ],
    ]) ?>

</div>
