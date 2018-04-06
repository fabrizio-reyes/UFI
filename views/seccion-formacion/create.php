<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SeccionFormacion */

$this->title = 'Create Seccion Formacion';
$this->params['breadcrumbs'][] = ['label' => 'Seccion Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="seccion-formacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
