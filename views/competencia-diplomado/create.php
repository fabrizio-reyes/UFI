<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CompetenciaDiplomado */

$this->title = 'Create Competencia Diplomado';
$this->params['breadcrumbs'][] = ['label' => 'Competencia Diplomados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencia-diplomado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
