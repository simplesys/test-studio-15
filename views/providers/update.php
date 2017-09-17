<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\Providers */

$this->title = 'Обновление поставщика: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Поставщики', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
    'label' => $model->name, 'url' => ['view', 'id' => $model->id]
];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="providers-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
