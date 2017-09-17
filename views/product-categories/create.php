<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\db\ProductCategories */

$this->title = 'Создание категории товаров';
$this->params['breadcrumbs'][] = [
    'label' => 'Категории товаров', 'url' => ['index']
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model]) ?>

</div>
