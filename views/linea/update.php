<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Linea */

/*$this->title = 'Update Linea: ' . $model->lin_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Lineas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lin_codigo, 'url' => ['view', 'id' => $model->lin_codigo]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="linea-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
