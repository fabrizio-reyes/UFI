<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaFormacion */

$this->title = 'Create Competencia Formacion';
$this->params['breadcrumbs'][] = ['label' => 'Competencia Formacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencia-formacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
