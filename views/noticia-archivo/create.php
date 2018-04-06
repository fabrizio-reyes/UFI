<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NoticiaArchivo */

$this->title = 'Create Noticia Archivo';
$this->params['breadcrumbs'][] = ['label' => 'Noticia Archivos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="noticia-archivo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
