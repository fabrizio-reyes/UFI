<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaGenerica */

$this->title = 'Create Competencia Generica';
$this->params['breadcrumbs'][] = ['label' => 'Competencia Genericas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencia-generica-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
