<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DatosUfi */

/*$this->title = 'Create Datos Ufi';
$this->params['breadcrumbs'][] = ['label' => 'Datos Ufis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;*/
?>
<div class="datos-ufi-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form_create', [
        'model' => $model,
    ]) ?>

</div>
