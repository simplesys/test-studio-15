<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\db\ProductTypes */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Типы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-types-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(
            'Обновить', ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']
        ) ?>
        <?= Html::a(
            'Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить тип товара '
                    . $model->name . '?',
                'method' => 'post',
            ]]
        ) ?>
    </p>

    <?= DetailView::widget(
        ['model' => $model, 'attributes' => ['id', 'category.name', 'name']]
    ) ?>
</div>
