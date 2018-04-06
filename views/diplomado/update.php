<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Diplomado */

/*$this->title = 'Update Diplomado: ' . $model->dip_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Diplomados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dip_codigo, 'url' => ['view', 'id' => $model->dip_codigo]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="diplomado-update">

     <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
