<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entreprises */

$this->title = Yii::t('app', 'Create Entreprises');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entreprises'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entreprises-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
