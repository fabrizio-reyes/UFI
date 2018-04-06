<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FormacionIntegral */

$this->title = 'Editando Formación Integral: ';
/*$this->params['breadcrumbs'][] = ['label' => 'Formacion Integrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->for_codigo, 'url' => ['view', 'id' => $model->for_codigo]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="formacion-integral-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
