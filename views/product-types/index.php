<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use \app\models\db\ProductCategories;
/* @var $this yii\web\View */
/* @var $searchModel app\models\db\search\ProductTypesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-types-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(
            'Создать тип товара', ['create'], ['class' => 'btn btn-success']
        ) ?>
    </p>
<?php
Pjax::begin();
echo GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'id_category',
                'label' => 'Категория',
                'format' => 'text',
                'content' => function ($data) {
                    return $data->category->name;
                },
                'filter' => $searchModel::getDropdownArray(new ProductCategories())
            ],
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]
);
Pjax::end();
?>
</div>
