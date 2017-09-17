<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\db\Items */

$this->title = 'Создание нового товара';
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-create">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', ['model' => $model]) ?>
</div>
