<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\db\search\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Создать товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php

$all = $dataProvider->query->all();
Pjax::begin();
echo GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{summary}\n{pager}\n{items}\n{pager}",
        'columns' => [
            ['attribute' => 'id', 'filter' => false],
            'categoryName',
            'productTypeName',
            'quantity',
            'providerName',
            'date_delivery',
            'price',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]
);
Pjax::end();
?>
</div>
