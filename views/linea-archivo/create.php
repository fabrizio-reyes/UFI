<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LineaArchivo */

$this->title = 'Create Linea Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Linea Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="linea-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
