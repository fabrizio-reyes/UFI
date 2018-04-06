<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Diplomado */

/*$this->title = 'Create Diplomado';
$this->params['breadcrumbs'][] = ['label' => 'Diplomados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="diplomado-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form_create', [
        'model' => $model,
    ]) ?>

</div>
