<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\Items */

$this->title = 'Обновление товара: ' . $model->productTypeName;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
    'label' => $model->productTypeName, 'url' => ['view', 'id' => $model->id]
];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="items-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
