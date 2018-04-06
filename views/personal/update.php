<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Personal */

/*$this->title = 'Update Personal: ' . $model->pers_codigo;
$this->params['breadcrumbs'][] = ['label' => 'Personals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pers_codigo, 'url' => ['view', 'id' => $model->pers_codigo]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="personal-update">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
