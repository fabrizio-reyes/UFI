<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoArchivo */

$this->title = 'Create Tipo Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
