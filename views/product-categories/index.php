<?php
/**
 * @var $this yii\web\View
 * @var $searchModel app\models\db\search\ProductCategoriesSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 */

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = 'Категории товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-categories-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(
            'Создать категорию', ['create'], ['class' => 'btn btn-success']
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
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]
);
Pjax::end();
?>
</div>
